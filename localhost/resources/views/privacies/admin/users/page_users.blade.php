@extends('layouts.app')

@section('content')


    @include('sliders.slider_top', [
    'bg_1'=>'hero_bg_1_one.jpg',
    'top_slider_h1_1'=>'Пользователи',
    'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
    ])

    @include('privacies.admin.users.for_users_table')

@endsection
