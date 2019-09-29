import ArticleEditor from './components/ArticleEditor.vue'
import ArticleViewer from './components/ArticleViewer.vue'
import Home from './components/Home.vue'
import VueRouter from 'vue-router'

const routes = [
    {
        component: Home,
        path: '/'
    },
    {
        component: ArticleViewer,
        path: '/articles/:id'
    },
    {
        component: ArticleEditor,
        path: '/articles/:id/edit',
        props: {
            isNew: false
        }
    },
    {
        component: ArticleEditor,
        path: '/articles',
        props: {
            isNew: true
        }
    }
]

const router = new VueRouter({
    routes
})

export default router
