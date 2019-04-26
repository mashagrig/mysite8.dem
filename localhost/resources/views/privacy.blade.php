
@extends('layouts.app')

@section('content')

    @include('sliders.slider_top', [
    'bg_1'=>'hero_bg_1_one.jpg',
    'top_slider_h1_1'=>'Ваш личный кабинет',
    'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
    ])

    @yield('privacy_guest')




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


