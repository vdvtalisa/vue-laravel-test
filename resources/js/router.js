import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import firstPage from './components/pages/MyFirstVuePage.vue'
import newRoutePage from './components/pages/NewRoutePage.vue'
import hooks from './components/pages/basic/Hooks'
import methodTest from './components/pages/basic/Methods'
import home from './components/pages/Home'

const routes = [
    {
        path: '/',
        component: home,
        name: 'home'

    },
    {
        path: '/my-new-vue-route',
        component: firstPage
    },
    {
        path: '/new-route',
        component: newRoutePage
    },

    //vue hooks

    {
        path: '/hooks',
        component: hooks
    },

    {
        path: '/method-test',
        component: methodTest
    }
]

export default new Router({
    mode: 'history',
    routes
})
