require('./bootstrap');

import Vue from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue'
import { Link } from '@inertiajs/inertia-vue'

Vue.component('inertia-link', Link)
Vue.prototype.$route = route

const app = document.getElementById('app');
if (app) {
    createInertiaApp({
        resolve: name => require(`./Pages/${name}`),
        setup({el, App, props}) {
            new Vue({
                render: h => h(App, props),
            }).$mount(el)
        },
    })
}
