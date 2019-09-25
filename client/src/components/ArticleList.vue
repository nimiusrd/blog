<template>
    <div class="list">
        <ArticleListHeader />
        <ArticleListItem
            v-for="item in items"
            :author="item.author"
            :id="item.id"
            :key="item.key"
            :postedAt="item.postedAt"
            :title="item.title"
            :updatedAt="item.updatedAt"
        />
    </div>
</template>

<script>
import Vue from 'vue'
import ArticleListHeader from './ArticleListHeader.vue'
import ArticleListItem from './ArticleListItem.vue'

const ArticleList = Vue.extend({
    components: {
        ArticleListHeader,
        ArticleListItem
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
            }
        ]
    })
})

export default ArticleList
</script>

<style scoped>
.list {
    border: black 1px solid;
    margin: 0;
    padding: 0;
}
</style>
