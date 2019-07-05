<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body style="background-image: url('{{ asset("images/bg.jpg") }}'); width: 100%!important;">
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

