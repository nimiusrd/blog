<template>
    <div class="home">
        <ArticleAddButton />
        <ArticleList />
    </div>
</template>

<script>
import ArticleAddButton from './ArticleAddButton.vue'
import ArticleList from './ArticleList.vue'
import Vue from 'vue'

const Home = Vue.extend({
    components: {
        ArticleAddButton,
        ArticleList
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
