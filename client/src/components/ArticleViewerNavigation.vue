<template>
    <div class="navigation">
        <button class="button edit" @click="handleClickEdit">
            Edit
        </button>
        <button class="button home" @click="handleClickHome">
            Home
        </button>
        <button class="button delete" @click="handleClickDelete">
            Delete
        </button>
    </div>
</template>

<script lang="ts">
import Vue from 'vue'

const ArticleViewerNavigation = Vue.extend({
    methods: {
        deleteArticle() {
            const id = this.$route.params.id

            fetch(
                `/api/articles/${id}`,
                {
                    method: 'DELETE'
                }
            )
                .catch(reason => {
                    console.log(reason)
                })
        },
        handleClickDelete() {
            this.deleteArticle()
            this.$router.push({
                path: '/'
            })
        },
        handleClickEdit() {
            const id = this.$route.params.id

            this.$router.push({
                path: `/articles/${id}/edit`
            })
        },
        handleClickHome() {
            this.$router.push({
                path: '/'
            })
        }
    }
})

export default ArticleViewerNavigation
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
