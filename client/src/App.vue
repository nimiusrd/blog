<template>
    <div id="app">
        <ArticleList />
    </div>
</template>

<script>
import Vue from 'vue'
import ArticleList from './components/ArticleList.vue'

const App = Vue.extend({
    components: {
        ArticleList
    }
})

export default App
</script>

<style>
#app {
    font-family: "Avenir", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
</style>
