<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body style="background-image: url('{{ asset("images/bg.jpg") }}');">



{{------------------------------------------------------------------}}
{{--<div class="cssload-wrap">--}}
{{--<div class="cssload-cssload-spinner"></div>--}}
{{--</div>--}}


{{------------------------------------------------------------------}}
<!-- ##### Preloader ##### -->
<div id="preloader">
    <i class="circle-preloader"></i>
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

