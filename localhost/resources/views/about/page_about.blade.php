@extends('layouts.app')

@section('content')
    @include('sliders.slider_top', [
'bg_1'=>'hero_b1_1.jpg',
    'top_slider_h1_1'=>'Клуб Sport',
    'top_slider_test_1'=>'Присоединяйтесь к нашей команде',
])
    @include('about.about')
    @include('sliders.slider_photo_gallery')
    @include('about.actions')
    @include('icon_blocks.icon_blocks_partners')
    @include('sliders.slider_comments')
@endsection
