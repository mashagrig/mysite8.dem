//window.Vue = require('vue');
//Vue.component('app', require('./components/App.vue').default);


import Vue from 'vue'
import App from '/components/App.vue'

const app_test = new Vue({
    el: '#app_test',
    //components: { App, Hello, Home },
  components: { 'app': App },
  //  router,
    mounted() {
    console.log('Component mounted.')
}
});





