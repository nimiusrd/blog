<template>
    <div class="editor">
        <div class="navigation">
            <button
                @click.prevent="handleClickSend"
                class="button send"
                :disabled="!sendable"
            >
                {{ sendText }}
            </button>
            <button
                @click.prevent="handleClickBack"
                class="button back"
            >
                Back
            </button>
        </div>
        <div class="author">
            <label class="label" for="author">
                Author:
            </label>
            <input
                autocomplete="off"
                class="text-input"
                name="author"
                type="text"
                v-model="author"
            >
        </div>
        <div class="title">
            <label class="label" for="title">
                Title:
            </label>
            <input
                autocomplete="off"
                class="text-input"
                name="title"
                type="text"
                v-model="title"
            >
        </div>
        <VueEditor v-model="content" :disabled="!sendable" :editorOptions="editorOptions" />
    </div>
</template>

<script>
import Vue from 'vue'
import { VueEditor } from "vue2-editor"
import fetch from 'node-fetch'

const ArticleEditor = Vue.extend({
    created: function () {
        this.getArticle()
    },
    components: {
        VueEditor
    },
    computed: {
        sendText: function () {
            return this.isNew ? 'Post' : 'Save'
        }
    },
    data: () => ({
        author: '',
        content: '',
        editorOptions: {
            theme: 'snow'
        },
        sendable: false,
        title: ''
    }),
    methods: {
        getArticle() {
            const vm = this

            if (vm.isNew) {
                vm.sendable = true

                return
            }
            vm.author = 'Loading ...'
            vm.content = '<h1>Loading ...</h1>'
            vm.title = 'Loading ...'
            const id = this.$route.params.id

            fetch(`/api/articles/${id}`)
                .then(res => res.json())
                .then(json => {
                    vm.author = json.author
                    vm.content = json.content
                    vm.sendable = true
                    vm.title = json.title
                })
                .catch(() => {
                    vm.author = 'Error'
                    vm.content = '<h1 style="color: red;">Error</h1>'
                    vm.title = 'Error'
                })
        },
        handleClickBack() {
            this.$router.go(-1)
        },
        handleClickSend() {
            if (this.isNew) {
                this.postArticle()
            } else {
                this.updateArticle()
            }
            this.$router.go(-1)
        },
        postArticle() {
            const body = {
                author: this.author,
                content: this.content,
                title: this.title
            }

            fetch(
                `/api/articles`,
                {
                    body: JSON.stringify(body),
                    method: 'POST'
                }
            )
                .catch(reason => {
                    console.log(reason)
                })
        },
        updateArticle() {
            const id = this.$route.params.id
            const body = {
                author: this.author,
                content: this.content,
                title: this.title
            }

            fetch(
                `/api/articles/${id}`,
                {
                    body: JSON.stringify(body),
                    method: 'PUT'
                }
            )
                .catch(reason => {
                    console.log(reason)
                })
        }
    },
    props: {
        isNew: Boolean
    }
})

export default ArticleEditor
</script>

<style scoped>
.author {
    margin: 8px;
}
.button {
    font-size: 20px;
    font-weight: 500;
    margin: 8px;
    min-width: 100px;
    padding: 16px;
}
.label {
    font-size: 20px;
}
.navigation {
    align-items: center;
    justify-content: left;
    display: flex;
}
.text-input {
    font-size: 20px;
}
.title {
    margin: 8px;
}
</style>
