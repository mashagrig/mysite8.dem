
@extends('layouts.app')

@section('content')

    @include('sliders.slider_top', [
    'bg_1'=>'hero_bg_1_one.jpg',
    'top_slider_h1_1'=>'Личный кабинет',
    'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
    ])

    @yield('profile')
    @yield('users')
    @yield('signup_shedule')
    @yield('signup_card')
    @yield('comments')
    @yield('faq')




    {{--@can("manipulate", "App\SheduleUser")--}}
    {{--@auth--}}
        {{--@include('signup.success_singup_list',[--}}
            {{--'check_shedule_id'=>$check_shedule_id,--}}
            {{--'max_date_select' => $max_date_select,--}}
            {{--'each_check_shedule_info' => $each_check_shedule_info,--}}
        {{--])--}}
    {{--@endauth--}}
    {{--@endcan--}}

    {{--@can("manipulate", "App\SheduleUser")--}}
    {{--@auth--}}
        {{--@include('signup.success_singup_list',[--}}
            {{--'check_shedule_id'=>$check_shedule_id,--}}
            {{--'max_date_select' => $max_date_select,--}}
            {{--'each_check_shedule_info' => $each_check_shedule_info,--}}
        {{--])--}}
    {{--@endauth--}}
    {{--@endcan--}}

@endsection


