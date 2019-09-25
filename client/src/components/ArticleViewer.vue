<template>
    <div class="viewer">
        {{'viewer' + $route.params.id}}
    </div>
</template>

<script>
import Vue from 'vue'

const ArticleViewer = Vue.extend({})

export default ArticleViewer
</script>

<style scoped>
</style>
