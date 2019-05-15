@extends('layouts.app')

@section('content')

    @include('sliders.slider_top', [
'bg_1'=>'hero_bg_1_one.jpg',
'top_slider_h1_1'=>'Верификация',
'top_slider_test_1'=>'Идивидуальный подход для эффективной тренировки'
])

    <p><br /></p>


<div class="container">
    {{--------------status-------------------------------------------------------------------------------------}}
    {{--@if (session('status'))--}}
        {{--<div class="row  text-center">--}}
            {{--<div class="col-md-12  text-center">--}}
                {{--<div class="form-group row  text-center">--}}
                    {{--<div class="alert alert-success" role="alert">--}}
                        {{--{{ session('status') }}--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div></div>--}}
    {{--@endif--}}
    {{------------------------------------------------------------}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтверждение Вашего Email адреса') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{--{{ __('Отправить новую сслылку для подтверждения Вашего email адреса.') }}--}}
                            {{ __('Вам на почту было отправлено повторное письмо верификации.') }}
                        </div>
                    @endif
                        {{--------------status-------------------------------------------------------------------------------------}}
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        {{------------------------------------------------------------}}

                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ваш E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <p>
                                        {{ __('Для повторной отправки письма верификации почты, нажмите кнопку.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Отправить ссылку') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    {{--{{ __('Для получения приватного доступа на сайт, пожалуйста, подтвердите Ваш email, перейдя по ссылке в письме.') }}--}}
                    {{--{{ __('Если Вы не получили письмо ') }}, <a href="{{ route('verification.resend') }}">{{ __('кликните сюда для повторной отправки.') }}</a>.--}}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
