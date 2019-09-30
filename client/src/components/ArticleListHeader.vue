<template>
    <li class="item">
        <div class="title">
            TITLE
        </div>
        <div class="author">
            AUTHOR
        </div>
        <div class="posted-at">
            POSTED AT
        </div>
        <div class="updated-at">
            UPDATED AT
        </div>
    </li>
</template>

<script lang="ts">
import Vue from 'vue'

const ArticleListHeader = Vue.extend({})

export default ArticleListHeader
</script>

<style scoped>
.item {
    display: grid;
    font-size: 20px;
    font-weight: 600;
    grid-template:
        "title author posted-at updated-at"
        / 3fr 1fr 1fr 1fr;
    text-align: center;
}

.title {
    border: 1px black solid;
    grid-area: title;
    padding: 16px;
}

.author {
    border: 1px black solid;
    grid-area: author;
    padding: 16px;

}

.posted-at {
    border: 1px black solid;
    grid-area: posted-at;
    padding: 16px;
}

.updated-at {
    border: 1px black solid;
    grid-area: updated-at;
    padding: 16px;
}
</style>
