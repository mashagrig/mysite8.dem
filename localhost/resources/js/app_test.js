import Vue from 'vue';
import VueRouter from 'vue-router';

import App from './components/App';
import Hello from './components/Hello';
import Home from './components/Home';

Vue.use(VueRouter);

const app_test = new Vue({
    el: '#app_test',
    components: { App },
    router,
});
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
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

