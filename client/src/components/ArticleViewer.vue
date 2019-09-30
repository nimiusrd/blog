<template>
    <div class="viewer">
        <ArticleViewerNavigation />
        <ArticleViewerArticle />
    </div>
</template>

<script lang="ts">
import ArticleViewerArticle from './ArticleViewerArticle.vue'
import ArticleViewerNavigation from './ArticleViewerNavigation.vue'
import Vue from 'vue'

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
