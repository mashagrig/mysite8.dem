@extends('layouts.app')

@section('content')


    @include('sliders.slider_top', [
    'bg_1'=>'hero_b1_1.jpg',
    'top_slider_h1_1'=>'Программы тренировок',
    'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
    ])

    @include('icon_blocks.icon_blocks_programs')
    @include('programs.each_program')



@endsection
