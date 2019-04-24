
@extends('layouts.app')

@section('content')

    @include('sliders.slider_top', [
    'bg_1'=>'hero_bg_1_one.jpg',
    'top_slider_h1_1'=>'Ваш личный кабинет',
    'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
    ])

    {{--<p><br /></p>--}}
    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-md-8">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-body text-center orange">--}}
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success" role="alert">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--<p class="orange text-uppercase">Вы успешно авторизованы</p>--}}
                        {{--<p class="orange text-uppercase">Добро пожаловать в Ваш личный кабинет.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<p><br /></p>--}}

    @yield('privacy_guest')




    {{--@can("manipulate", "App\SheduleUser")--}}
    {{--@auth--}}
        {{--@include('singup.success_singup_list',[--}}
            {{--'check_shedule_id'=>$check_shedule_id,--}}
            {{--'max_date_select' => $max_date_select,--}}
            {{--'each_check_shedule_info' => $each_check_shedule_info,--}}
        {{--])--}}
    {{--@endauth--}}
    {{--@endcan--}}

    {{--@can("manipulate", "App\SheduleUser")--}}
    {{--@auth--}}
        {{--@include('singup.success_singup_list',[--}}
            {{--'check_shedule_id'=>$check_shedule_id,--}}
            {{--'max_date_select' => $max_date_select,--}}
            {{--'each_check_shedule_info' => $each_check_shedule_info,--}}
        {{--])--}}
    {{--@endauth--}}
    {{--@endcan--}}

@endsection


