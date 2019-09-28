<template>
    <div class="viewer">
        <button
            @click="handleClickEdit"
        >
            Edit
        </button>
        <button
            @click="handleClickDelete"
        >
            Delete
        </button>
        <button
            @click="handleClickHome"
        >
            Home
        </button>
        <div>
            {{ title }}
        </div>
        <div>
            {{ author }}
        </div>
        <div>
            {{ updatedAt }}
        </div>
        <div>
            {{ postedAt }}
        </div>
        <div v-html="content" />
    </div>
</template>

<script>
import Vue from 'vue'

const ArticleViewer = Vue.extend({
    created() {
        this.getArticle()
    },
    data() {
        return {
            author: '',
            content: '',
            postedAt: '',
            updatedAt: '',
            title: ''
        }
    },
    methods: {
        deleteArticle() {
            const vm = this
            const id = this.$route.params.id

            fetch(
                `/api/articles/${id}`,
                {
                    method: 'DELETE'
                }
            )
                .catch(reason => {
                    console.log(reason)
                })
        },
        getArticle() {
            const vm = this
            const id = this.$route.params.id

            fetch(
                `/api/articles/${id}`,
                {
                    method: 'GET'
                }
            )
                .then(res => res.json())
                .then(json => {
                    vm.author = json.author
                    vm.content = json.content
                    vm.postedAt = new Date(json['posted_at']).toString()
                    vm.updatedAt = new Date(json['updated_at']).toString()
                    vm.title = json.title
                })
                .catch(reason => {
                    console.log(reason)
                })
        },
        handleClickDelete() {
            this.deleteArticle()
            this.$router.push({
                path: `/`
            })
        },
        handleClickEdit() {
            const id = this.$route.params.id

            this.$router.push({
                path: `/articles/${id}/edit`
            })
        },
        handleClickHome() {
            this.$router.push({
                path: `/`
            })
        }
    }
})

export default ArticleViewer
</script>

<style scoped>
</style>
