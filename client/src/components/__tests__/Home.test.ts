import Home from '@/components/Home.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount(Home)

    expect(wrapper.html()).toMatchSnapshot()
})
