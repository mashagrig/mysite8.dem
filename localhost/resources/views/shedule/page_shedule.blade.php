@extends('layouts.app')

@section('content')


    @include('sliders.slider_top', [
    'bg_1'=>'hero_bg_1_one.jpg',
    'top_slider_h1_1'=>'Расписание',
    'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
    ])

    @include('shedule.for_shedule_table')

    {{--@include('shedule.for_shedule_table',[--}}
            {{--'max_date_select' => $max_date_select,--}}
            {{--'program_select' => $program_select,--}}
            {{--'trainers_select' => $trainers_select,--}}
             {{--'shedule_for_date' => $shedule_for_date,--}}
             {{--'period_select' => $period_select,--}}
            {{--'check_shedule_id'=>$check_shedule_id--}}
    {{--])--}}
@endsection
