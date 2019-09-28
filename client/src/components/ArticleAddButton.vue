<template>
    <button @click="handleClickAdd">
        Add new Article
    </button>
</template>

<script>
import Vue from 'vue'

const ArticleAddButton = Vue.extend({
    methods: {
        handleClickAdd() {
            this.$router.push({
                path: '/articles'
            })
        }
    }
})

export default ArticleAddButton
</script>

<style scoped>

</style>
