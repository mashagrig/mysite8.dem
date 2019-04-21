
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//--------crossfits----------

require('../crossfits/js/jquery-3.3.1.min.js');
require('../crossfits/js/jquery-ui.js');
require('../crossfits/js/jquery.countdown.min.js');
require('../crossfits/js/jquery.magnific-popup.min.js');
require('../crossfits/js/jquery.stellar.min.js');
require('../crossfits/js/jquery-migrate-3.0.1.min.js');


require('../crossfits/js/main.js');
require('../crossfits/js/mediaelement-and-player.min.js');
require('../crossfits/js/owl.carousel.min.js');
//require('../crossfits/js/popper.min.js');
require('../crossfits/js/slick.min.js');

require('../crossfits/js/aos.js');
//require('../crossfits/js/bootstrap.min.js');
require('../crossfits/js/bootstrap-datepicker.min.js');

//-------------------------
require('./bootstrap');
require('./popper.min.js');
require('./purify.min.js');


 window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
