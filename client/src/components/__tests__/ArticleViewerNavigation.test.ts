import ArticleViewerNavigation from '@/components/ArticleViewerNavigation.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount(ArticleViewerNavigation)

    expect(wrapper.html()).toMatchSnapshot()
})
