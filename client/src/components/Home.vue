<template>
    <div class="home">
        <ArticleAddButton />
        <ArticleList />
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
.home {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>
