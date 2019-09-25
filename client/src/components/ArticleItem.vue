<template>
    <li class="article--item">
        <div class="article--item--title">
            {{ title }}
        </div>
        <div class="article--item--author">
            {{ author }}
        </div>
        <div class="article--item--posted-at">
            {{ formattedPostedAt }}
        </div>
        <div class="article--item--updated-at">
            {{ formattedUpdatedAt }}
        </div>
    </li>
</template>

<script>
import Vue from 'vue'

const ArticleItem = Vue.extend({
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
    }
})

export default ArticleItem
</script>
