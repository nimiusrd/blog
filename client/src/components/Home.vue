<template>
    <div class="home">
        <HomeNavigation />
        <ArticleList />
    </div>
</template>

<script lang="ts">
import ArticleList from './ArticleList.vue'
import HomeNavigation from './HomeNavigation.vue'
import Vue from 'vue'

const Home = Vue.extend({
    components: {
        ArticleList,
        HomeNavigation
    }
})

export default Home
</script>

<style scoped>
</style>
