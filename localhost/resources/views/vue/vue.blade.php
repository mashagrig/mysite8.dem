<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue SPA Demo</title>

    <script src="https://unpkg.com/vue"></script>


</head>
<body>
<div>h</div>
<div id="app_test">
    <app></app>
</div>
{{--<script src="{{ asset('js/draft/app_test.js') }}" type="vue"></script>--}}
<script>

   import App from '/js/draft/components/App.vue'

    const app_test = new Vue({
        el: '#app_test',
        //components: { App, Hello, Home },
       components: { 'app': App },
      //  components: { 'app': ('/js/draft/components/App.vue') },
        //  router,
        mounted() {
            console.log('Component mounted.')
        }
    });
</script>
{{--<script>--}}

    {{--//import Vue from 'vue';--}}
    {{--// import VueRouter from 'vue-router';--}}
    {{--//--}}
    {{--// import App from '/js/draft/components/App.vue';--}}
    {{--// import Hello from '/js/draft/components/Hello.vue';--}}
    {{--// import Home from '/js/draft/components/Home.vue';--}}

    {{--// Vue.use(VueRouter);--}}
    {{--//--}}
    {{--// const router = new VueRouter({--}}
    {{--//     mode: 'history',--}}
    {{--//     routes: [--}}
    {{--//         {--}}
    {{--//             path: '/home',--}}
    {{--//             name: 'Home',--}}
    {{--//             component: Home--}}
    {{--//         },--}}
    {{--//         {--}}
    {{--//             path: '/hello',--}}
    {{--//             name: 'Hello',--}}
    {{--//             component: Hello,--}}
    {{--//         },--}}
    {{--//     ],--}}
    {{--// });--}}

    {{--const app_test = new Vue({--}}
        {{--el: '#app_test',--}}
        {{--// components: { App, Hello, Home },--}}
        {{--// router,--}}
        {{--mounted() {--}}
            {{--console.log('Component mounted.')--}}
        {{--}--}}
    {{--});--}}

{{--</script>--}}

</body>
</html>
