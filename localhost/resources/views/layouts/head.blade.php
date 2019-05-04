<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">

{{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>@yield('title', 'SPORTFIT')</title>

    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet"  type="text/css">--}}

    {{--<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:300,400,500,700|Montserrat:300,400,500,700" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/draft/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">

    </head>
