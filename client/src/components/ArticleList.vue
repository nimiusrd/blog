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
    created() {
        this.getArticles()
    },
    components: {
        ArticleListHeader,
        ArticleListItem
    },
    data() {
        return {
            items: []
        }
    },
    methods: {
        getArticles() {
            const vm = this

            fetch(
                '/api/articles',
                {
                    method: 'GET'
                }
            )
                .then(res => res.json())
                .then(json => {
                    console.log(json)
                    vm.items = json
                })
                .catch(reason => {
                    console.log(reason)
                })
        },
        handleClickAdd() {
            this.$router.push({
                path: '/articles'
            })
        }
    }
})

export default ArticleList
</script>

<style scoped>
.list {
    border: black 1px solid;
    margin: 0;
    padding: 0;
    width: 100%;
}
</style>
