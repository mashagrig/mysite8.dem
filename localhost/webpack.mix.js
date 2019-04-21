const mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// mix.autoload({
//     jquery: ['$','jQuery','jquery','global.$','global.jQuery','global.jquery'],
//    // stellar: ['stellar']
// });

// var webpack = require('webpack');
// mix.webpackConfig({
//     plugins: [
//         new webpack.ProvidePlugin({
//         //    stellar : 'jquery.stellar',
//            // Stellar : 'exports-loader?Stellar!stellar'
//         })
//     ]
// });

mix
    .copy([
        'resources/crossfits/fonts/all',
        // 'resources/crossfits/fonts/all/Flaticon.eot',
        // 'resources/crossfits/fonts/all/flaticon.html',
        // 'resources/crossfits/fonts/all/Flaticon.svg',
        // 'resources/crossfits/fonts/all/Flaticon.ttf',
        // 'resources/crossfits/fonts/all/Flaticon.woff',
        // 'resources/crossfits/fonts/all/Flaticon.woff2',
        // 'resources/crossfits/fonts/all/icomoon.eot',
        // 'resources/crossfits/fonts/all/icomoon.svg',
        // 'resources/crossfits/fonts/all/icomoon.ttf',
        // 'resources/crossfits/fonts/all/icomoon.woff',
        // 'resources/crossfits/fonts/all/selection.json'

    ],  'public/css/fonts')

    .copy([
        'resources/crossfits/images'
    ],  'public/images');

mix.copy([
    'node_modules/popper.js/dist/popper.js',
    'node_modules/popper.js/dist/popper.js.map',
    'node_modules/popper.js/dist/popper.min.js.map',
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery/dist/jquery.min.map',
    'node_modules/jquery-migrate/dist/jquery-migrate.min.js',
    'node_modules/jquery-ui-css/jquery-ui.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.js.map',
    'node_modules/bootstrap/dist/js/bootstrap.min.js.map',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
    'node_modules/jquery.stellar/jquery.stellar.js',
    'node_modules/jquery.countdown/jquery.countdown.js',
    'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'node_modules/purify/lib/purify.js',
    'node_modules/aos/dist/aos.js',
   'resources/js/scrollup.js',
    'node_modules/jscroll/dist/jquery.jscroll.min.js'

], 'public/js/libs');


// mix.js([
//    //  'node_modules/popper.js/dist/popper.js',
//    //  'node_modules/popper.js/dist/popper.js.map',
//    //  'node_modules/popper.js/dist/popper.min.js.map',
//    //  'node_modules/jquery/dist/jquery.js',
//    //  'node_modules/jquery/dist/jquery.min.map',
//    //  'node_modules/jquery-migrate/dist/jquery-migrate.min.js',
//    //  'node_modules/jquery-ui-css/jquery-ui.min.js',
//    //  'node_modules/bootstrap/dist/js/bootstrap.min.js',
//    //  'node_modules/bootstrap/dist/js/bootstrap.js.map',
//    //  'node_modules/bootstrap/dist/js/bootstrap.min.js.map',
//    //  'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
//    //  'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
//    //  'node_modules/owl.carousel/dist/owl.carousel.min.js',
//    //  'node_modules/jquery.stellar/jquery.stellar.js',
//    //  'node_modules/jquery.countdown/jquery.countdown.js',
//    //  'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
//    //  'node_modules/purify/lib/purify.js',
//    //  'node_modules/aos/dist/aos.js',
//     'resources/js/scrollup.js',
//     'node_modules/jscroll/dist/jquery.jscroll.min.js'
//
// ], 'public/plugins.js');


mix
    .js('resources/js/app.js', 'public/js')
    .js('public/js/draft/main.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css/app.css');


mix
    .styles(
        [
            'node_modules/jquery-ui-css/jquery-ui.min.css',
            'node_modules/bootstrap/dist/css/bootstrap.css',
            'node_modules/magnific-popup/dist/magnific-popup.css',
            'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
            'node_modules/mediaelement/build/mediaelementplayer.min.css',
            'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
            'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
            'node_modules/animate.css/animate.min.css',
            'node_modules/aos/dist/aos.css',
            'resources/crossfits/fonts/all/flaticon.css',
            'resources/crossfits/fonts/all/style.css'
        ],
        'public/css/app.css'
    )
    .styles(
        [
            'public/css/draft/style.css'
        ],
        'public/css/style.css'
    )
    .styles(
        [
            'public/css/draft/flaticon.css'
        ],
        'public/css/flaticon.css'
    );



