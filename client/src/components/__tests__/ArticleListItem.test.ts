import ArticleListItem from '@/components/ArticleListItem.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount<ArticleListItem>(ArticleListItem, {
        propsData: {
            author: 'author',
            id: 1,
            postedAt: '2019-09-28T06:34:56+00:00',
            title: 'title',
            updatedAt: '2019-09-29T05:03:43+00:00'
        }
    })

    expect(wrapper.html()).toMatchSnapshot()
})
