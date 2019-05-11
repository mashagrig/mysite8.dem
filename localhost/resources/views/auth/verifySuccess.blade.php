@extends('layouts.app')

@section('content')

    @include('sliders.slider_top', [
'bg_1'=>'hero_bg_1_one.jpg',
'top_slider_h1_1'=>'Регистрация',
'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
])

    <p><br /></p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Ваш e-mail был успешно верифицирован') }}
                    </div>

                    <div class="card-body">


                            <div class="form-group row">
                                <div class="col text-center">
                                    {{ __('Добро пожаловать на сайт ))') }}
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
