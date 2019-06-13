<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body style="background-image: url('{{ asset("images/bg.jpg") }}'); width: 100%!important;">
{{------------------------------------------------------------------}}
<style type="text/css">
    /* :: 3.5.0 Preloader */
    #preloader {
        width: 120pt;
        height: 120pt;
        position: fixed;
        top: 50%;
        left: 45%;
        z-index: 5000; }
    #preloader .circle-preloader {
        display: block;
        width: 120pt;
        height: 120pt;
        border: 10px solid rgba(0, 0, 0, 0.1);
        border-bottom-color: #fd7e14;
        border-radius: 50%;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        animation: spin 2s infinite linear; }
    @-webkit-keyframes spin {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg); } }
    @keyframes spin {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg); } }



    @media (max-width: 300px) {

        #preloader {
            width: 50pt;
            height: 50pt;
            position: fixed;
            /*top: 40%;*/
            /*left: 40%;*/
            z-index: 5000; }
        #preloader .circle-preloader {
            display: block;
            width: 50pt;
            height: 50pt;
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-bottom-color: #fd7e14;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            animation: spin 2s infinite linear; }
        @-webkit-keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg); } }
        @keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg); } }
    }
</style>
{{------------------------------------------------------------------}}
<!-- ##### Preloader ##### -->
<div id="preloader">
    <span class="circle-preloader"></span>
</div>
{{------------------------------------------------------------------}}

        <div class="site-wrap">
        @include('layouts.nav')
        <main class="py-4">

                @yield('content')
        </main>
        </div>
    @include('layouts.footer')
</body>
</html>

