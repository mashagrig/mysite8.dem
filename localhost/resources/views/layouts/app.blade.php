<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body style="background-image: url('{{ asset("images/bg.jpg") }}'); width: 100%!important;">



{{------------------------------------------------------------------}}
{{--<div class="cssload-wrap">--}}
{{--<div class="cssload-cssload-spinner"></div>--}}
{{--</div>--}}


{{------------------------------------------------------------------}}
<style type="text/css">
    /* :: 3.5.0 Preloader */
    #preloader {
        /*background: #fd7e14;*/
        /*background: -webkit-linear-gradient(to right, #b6e358, #38b143);*/
        /*background: linear-gradient(to right, #b6e358, #38b143);*/
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
{{--<div id="preloader">--}}
{{--<div class="cssload-dots">--}}
{{--<div class="cssload-dot"></div>--}}
{{--<div class="cssload-dot"></div>--}}
{{--<div class="cssload-dot"></div>--}}
{{--<div class="cssload-dot"></div>--}}
{{--<div class="cssload-dot"></div>--}}
{{--</div>--}}

{{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg">--}}
{{--<defs>--}}
{{--<filter id="goo">--}}
{{--<feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="12" ></feGaussianBlur>--}}
{{--<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0	0 1 0 0 0	0 0 1 0 0	0 0 0 18 -7" result="goo" ></feColorMatrix>--}}
{{--<!--<feBlend in2="goo" in="SourceGraphic" result="mix" ></feBlend>-->--}}
{{--</filter>--}}
{{--</defs>--}}
{{--</svg>--}}
{{--</div>--}}
{{------------------------------------------------------------------}}
{{--<div class="cssload-wrap">--}}
{{--<div class="cssload-cssload-spinner"></div>--}}
{{--</div>--}}
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

