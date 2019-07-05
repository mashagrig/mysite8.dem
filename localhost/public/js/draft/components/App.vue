<template>
    <div>
        <h1>Vue Router Demo App</h1>

        <p>
            <router-link :to="{ name: 'Home' }">Home</router-link> |
            <router-link :to="{ name: 'Hello' }">Hello World</router-link>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
   // import Vue from 'vue';
    import VueRouter from 'vue-router';

  //  import App from '/components/App.vue';
    import Hello from '/components/Hello.vue';
    import Home from '/components/Home.vue';

    Vue.use(VueRouter);
    const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/home',
                name: 'Home',
                component: Home
            },
            {
                path: '/hello',
                name: 'Hello',
                component: Hello,
            },
        ],
    });



    export default {
        name: "App",
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<!--<style scoped>-->

<!--</style>-->
