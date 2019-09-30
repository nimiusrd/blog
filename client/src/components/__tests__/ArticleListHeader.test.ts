import ArticleListHeader from '@/components/ArticleListHeader.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount(ArticleListHeader)

    expect(wrapper.html()).toMatchSnapshot()
})
