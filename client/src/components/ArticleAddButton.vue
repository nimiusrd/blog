<template>
    <button class="add-button" @click="handleClickAdd">
        Add new article
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
.add-button {
    font-size: 20px;
    font-weight: 500;
    margin: 8px;
    min-width: 100px;
    padding: 16px;
}
</style>
