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

//------------------------------
mix.styles(
    [
        'resources/crossfits/css/jquery-ui.css',
        'resources/crossfits/css/bootstrap/bootstrap.min.css',
        'resources/crossfits/css/bootstrap/bootstrap-grid.css',
        'resources/crossfits/css/bootstrap/bootstrap-reboot.css',
        'resources/crossfits/css/animate.css',
        'resources/crossfits/css/aos.css',
        'resources/crossfits/css/bootstrap.min.css',
        'resources/crossfits/css/bootstrap-datepicker.css',
        'resources/crossfits/css/magnific-popup.css',
        'resources/crossfits/css/mediaelementplayer.css',
        'resources/crossfits/css/owl.carousel.min.css',
        'resources/crossfits/css/owl.theme.default.min.css',
        'resources/crossfits/css/style.css',
        'resources/crossfits/fonts/flaticon/font/flaticon.css',
        'resources/crossfits/fonts/icomoon/style.css',
    ],
    'public/css/app.css'
);
mix.copy([
    'resources/crossfits/fonts/flaticon/font',
    'resources/crossfits/fonts/icomoon',
],  'public/css');
//---------------------

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
