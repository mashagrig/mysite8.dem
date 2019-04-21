

@extends('layouts.app')

@section('content')


    @include('sliders.slider_top', [
    'bg_1'=>'hero_bg_3.jpg',
    'top_slider_h1_1'=>'Тренеры',
    'top_slider_test_1'=>'Лучшая тренерская команда Москвы'
    ])


    @include('trainers.for_slider_trainers')
    @include('trainers.each_trainer')

@endsection
