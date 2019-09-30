import ArticleList from '@/components/ArticleList.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount(ArticleList, {
        methods: {
            getArticles() {
                this.$data.items = [
                    {
                        author: 'author',
                        content: 'content',
                        postedAt: '2019-09-28T06:34:56+00:00',
                        title: 'title',
                        updatedAt: '2019-09-28T06:34:56+00:00'
                    }
                ]
            }
        }
    })

    expect(wrapper.html()).toMatchSnapshot()
})
