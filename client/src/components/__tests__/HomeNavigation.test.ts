import HomeNavigation from '@/components/HomeNavigation.vue'
import {shallowMount} from '@vue/test-utils'

test('snapshot', () => {
    const wrapper = shallowMount(HomeNavigation)

    expect(wrapper.html()).toMatchSnapshot()
})
