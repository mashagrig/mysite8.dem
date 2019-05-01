@extends('layouts.app')

@section('content')

    @include('sliders.slider_top', [
'bg_1'=>'hero_bg_1_one.jpg',
'top_slider_h1_1'=>'Верификация',
'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
])

    <p><br /></p>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтверждение Вашего Email адреса') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Отправить новую сслылку для подтверждения Вашего email адреса.') }}
                        </div>
                    @endif

                    {{ __('Для получения приватного доступа на сайт, пожалуйста, подтвердите Ваш email, перейдя по ссылке в письме.') }}
                    {{ __('Если Вы не получили письмо ') }}, <a href="{{ route('verification.resend') }}">{{ __('кликните сюда для повторной отправки.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
