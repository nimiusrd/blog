<template>
    <div class="article">
        <div class="author">
            author: {{ author }}
        </div>
        <div class="posted-at">
            posted at {{ postedAt }}
        </div>
        <div class="updated-at">
            updated at {{ updatedAt }}
        </div>
        <div class="title">
            {{ title }}
        </div>
        <div class="content ql-editor" v-html="content" />
    </div>
</template>

<script lang="ts">
import Vue from 'vue'

const ArticleViewerArticle = Vue.extend({
    created() {
        this.getArticle()
    },
    data() {
        return {
            author: '',
            content: '',
            postedAt: '',
            title: '',
            updatedAt: ''
        }
    },
    methods: {
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
                    vm.postedAt = new Date(json['postedAt']).toDateString()
                    vm.updatedAt = new Date(json['updatedAt']).toDateString()
                    vm.title = json.title
                })
                .catch(reason => {
                    console.log(reason)
                })
        }
    }
})

export default ArticleViewerArticle
</script>

<style scoped>
@import '~quill/dist/quill.core.css';

.article {
    display: grid;
    grid-template:
        'author posted-at updated-at'
        'title title title'
        'content content content';
}
.author {
    grid-area: author;
    padding: 8px;
}
.posted-at {
    grid-area: posted-at;
    padding: 8px;
}
.updated-at {
    grid-area: updated-at;
    padding: 8px;
}
.title {
    font-size: 48px;
    font-weight: 600;
    grid-area: title;
    padding: 24px;
}
.content {
    grid-area: content;
}
</style>
