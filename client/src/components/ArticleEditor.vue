<template>
    <div class="editor">
        <label for="title">
            Title:
        </label>
        <input type="text" name="title" v-model="title">
        <label for="author">
            Author:
        </label>
        <input type="text" name="author" v-model="author">
        <button :disabled="!sendable">
            {{ sendText }}
        </button>
        <button>
            Cancel
        </button>
        <VueEditor v-model="content" :disabled="!sendable" />
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
        sendable: false,
        title: ''
    }),
    methods: {
        getArticle: function () {
            if (this.isNew) {
                return
            }
            this.author = 'Loading ...'
            this.content = '<h1>Loading ...</h1>'
            this.title = 'Loading ...'
            const id = this.$route.params.id
            const vm = this

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
        }
    },
    props: {
        isNew: Boolean
    }
})

export default ArticleEditor
</script>

<style scoped>
</style>
