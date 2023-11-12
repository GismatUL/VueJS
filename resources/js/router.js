import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import firstPage from './components/pages/MyFirstVuePage'

const routes = [
    {
        path:'my-first-new-route',
        component: firstPage
    }
];

export default Router({
    mode:'history',
    routes
})
