@extends('layouts.app')

@section('content')


    @include('sliders.slider_top', [
    'bg_1'=>'hero_b1_1.jpg',
    'top_slider_h1_1'=>'Клубные карты',
    'top_slider_test_1'=>'Индивидуальный подход к каждому гостю нашего клуба'
    ])

    @include('cards.for_icon_cards')
    @include('cards.for_each_card')

@endsection
