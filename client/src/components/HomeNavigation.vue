<template>
    <div class="navigation">
        <button class="add button" @click="handleClickAdd">
            Add new article
        </button>
    </div>
</template>

<script lang="ts">
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
.button {
    font-size: 20px;
    font-weight: 500;
    margin: 8px;
    min-width: 100px;
    padding: 16px;
}
.navigation {
    align-items: center;
    justify-content: left;
    display: flex;
}
</style>
