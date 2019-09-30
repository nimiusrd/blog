import ArticleViewerArticle from '@/components/ArticleViewerArticle.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount(ArticleViewerArticle, {
        methods: {
            getArticle() {
                this.$data.author = 'author'
                this.$data.content = 'content'
                this.$data.postedAt = '2019-09-28T06:34:56+00:00'
                this.$data.updatedAt = '2019-09-28T06:34:56+00:00'
                this.$data.title = 'title'
            }
        }
    })

    expect(wrapper.html()).toMatchSnapshot()
})
