@extends('layouts.app')

@section('content')

    @include('sliders.slider_top', [
    'bg_1'=>'hero_b1_1.jpg',
    'top_slider_h1_1'=>'Контакты',
    'top_slider_test_1'=>'Бесплатные Авто и вело парковки для наших гостей'
    ])

    <p><br /></p>
    @include('contacts.contacts')

@endsection
