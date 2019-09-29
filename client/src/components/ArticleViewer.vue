<template>
    <div class="viewer">
        <ArticleViewerNavigation />
        <ArticleViewerArticle />
    </div>
</template>

<script>
import Vue from 'vue'
import ArticleViewerArticle from './ArticleViewerArticle.vue'
import ArticleViewerNavigation from './ArticleViewerNavigation.vue'

const ArticleViewer = Vue.extend({
    components: {
        ArticleViewerArticle,
        ArticleViewerNavigation
    }
})

export default ArticleViewer
</script>

<style scoped>
</style>
