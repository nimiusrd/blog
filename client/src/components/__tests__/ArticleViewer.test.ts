import ArticleViewer from '@/components/ArticleViewer.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount(ArticleViewer)

    expect(wrapper.html()).toMatchSnapshot()
})
