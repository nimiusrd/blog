<template>
    <ul class="article--list">
        <ArticleItem
            v-for="item in items"
            :author="item.author"
            :id="item.id"
            :key="item.key"
            :postedAt="item.postedAt"
            :title="item.title"
            :updatedAt="item.updatedAt"
        />
    </ul>
</template>

<script>
import Vue from 'vue'
import ArticleItem from './ArticleItem.vue'

const ArticleList = Vue.extend({
    components: {
        ArticleItem
    },
    data: () => ({
        items: [
            {
                author: 'author1',
                id: 1,
                postedAt: '2019-09-19T13:18:32.000Z',
                title: 'title1',
                updatedAt: '2019-09-19T13:18:32.000Z'
            },
            {
                author: 'author2',
                id: 2,
                postedAt: '2019-09-19T13:18:32.000Z',
                title: 'title2',
                updatedAt: '2019-09-19T13:18:32.000Z'
            },
        ]
    })
})

export default ArticleList
</script>
