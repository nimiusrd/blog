<template>
    <div class="home">
        <ArticleList />
        <ArticleAddButton />
    </div>
</template>

<script>
import Vue from 'vue'
import ArticleList from './ArticleList.vue'
import ArticleAddButton from './ArticleAddButton.vue'

const Home = Vue.extend({
    components: {
        ArticleList,
        ArticleAddButton
    }
})

export default Home
</script>

<style scoped>

</style>
