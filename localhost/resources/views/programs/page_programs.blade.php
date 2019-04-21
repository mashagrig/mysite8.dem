@extends('layouts.app')

@section('content')


    @include('sliders.slider_top', [
    'bg_1'=>'hero_b1_1.jpg',
    'top_slider_h1_1'=>'Программы тренировок',
    'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
    ])

    @include('programs.for_icon_programs')
    @include('programs.for_each_program')



@endsection
