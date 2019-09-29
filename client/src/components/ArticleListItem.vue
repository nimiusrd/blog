<template>
    <li class="item" @click="handleClick">
        <div class="title">
            {{ title }}
        </div>
        <div class="author">
            {{ author }}
        </div>
        <div class="posted-at">
            {{ formattedPostedAt }}
        </div>
        <div class="updated-at">
            {{ formattedUpdatedAt }}
        </div>
    </li>
</template>

<script lang="ts">
import Vue from 'vue'

const ArticleListItem = Vue.extend({
    props: {
        id: Number,
        title: String,
        author: String,
        postedAt: String,
        updatedAt: String
    },
    computed: {
        formattedPostedAt: function() {
            return new Date(this.postedAt).toDateString()
        },
        formattedUpdatedAt: function() {
            return new Date(this.updatedAt).toDateString()
        },
    },
    methods: {
        handleClick() {
            this.$router.push({
                path: `/articles/${this.id}`
            })
        }
    }
})

export default ArticleListItem
</script>

<style scoped>
.item {
    display: grid;
    font-size: 16px;
    font-weight: 400;
    grid-template:
        "title author posted-at updated-at"
        / 3fr 1fr 1fr 1fr;
    text-align: center;
}

.item:hover {
    background: rgba(241, 243, 244);
    cursor: pointer;
}

.item:hover:active {
    background: rgba(231, 233, 235);
    cursor: pointer;
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
