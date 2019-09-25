import VueRouter from 'vue-router'
import ArticleList from './components/ArticleList.vue'
import ArticleViewer from './components/ArticleViewer.vue'
import ArticleEditor from './components/ArticleEditor.vue'

const routes = [
    {
        path: '/',
        component: ArticleList
    },
    {
        path: '/articles/:id',
        component: ArticleViewer
    },
    {
        path: '/articles/:id/edit',
        component: ArticleEditor,
        props: {
            isNew: false
        }
    },
    {
        path: '/articles',
        component: ArticleEditor,
        props: {
            isNew: true
        }
    }
]

const router = new VueRouter({
    routes
})

export default router
