
import Vue from 'vue';
import VueRouter from 'vue-router';

import App from 'components/App';
import Hello from 'components/Hello';
import Home from 'components/Home';
const app_test = new Vue({
    el: '#app_test',
    components: { App },
    router,
});
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
    ],
});


