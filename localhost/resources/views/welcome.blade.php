
@extends('layouts.app')

@section('content')
    @include('sliders.slider_top_three', [
'bg_1'=>'hero_b1_1.jpg',
'top_slider_h1_1'=>'Фитнес клуб Sport',
'top_slider_test_1'=>'Лучшие тренеры Москвы',
'bg_2'=>'hero_bg_2.jpg',
'top_slider_h1_2'=>'Эффективные тренировки',
'top_slider_test_2'=>'Мы ценим Ваше время',
'bg_3'=>'hero_bg_3.jpg',
'top_slider_h1_3'=>'Цели достижимы',
'top_slider_test_3'=>'Мы помогаем Вам на пути к успеху',
])

    @include('includes_bottom')

@endsection
