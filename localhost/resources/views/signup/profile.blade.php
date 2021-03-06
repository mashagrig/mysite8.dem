<?php

$surname = '';
$name = '';
$middle_name = '';
$email = '';
$phone = '';
$birthdate = '';
$binaryfiles_file_src = '';


if (Auth::user() !== null) {
    $current_user_id = Auth::user()->getAuthIdentifier();
    $profiles_user = $profiles;

    if($profiles_user !== null){
        $surname =  $profiles_user[0]->personalinfos_surname;
        $name = $profiles_user[0]->personalinfos_name;
        $middle_name = $profiles_user[0]->personalinfos_middle_name;
        $email = $profiles_user[0]->users_email;
        $phone = $profiles_user[0]->personalinfos_telephone;
        $birthdate = $profiles_user[0]->personalinfos_birthdate;
    }


//    $b_id_arr = \App\Binaryfile::
//    whereHas('users', function ($q) use ($current_user_id) {
//        $q->where('users.id', '=', "{$current_user_id}");
//    })
//        ->where('title', 'like', "%avatar%")
//        ->pluck('file_src')
//        ->toArray();
//    if (!empty($b_id_arr)) {
//        $binaryfiles_file_src = $b_id_arr[0];
//    }
}
?>

@extends('privacy')
@section('profile')
    {{--{{App\User::where('email', 'solnce52004@yandex.ru')->get('password')[0]->password}}--}}

    <div class="site-section  block-14 bg-light nav-direction-white">
        <div class="container">

            <div class="row  mb-3  text-center">
                <div class="col-md-12  text-center">
                    <h2 class="site-section-heading text-center">Мой профиль</h2>
                </div>
            </div>
            {{--------------status-------------------------------------------------------------------------------------}}
            @if (session('status'))
            <div class="row  text-center">
                <div class="col-md-12  text-center">
                        <div class="form-group row  text-center">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>

                </div></div>
            @endif
            {{------------------------------------------------------------}}
            <div class="row">
                <div class="col-lg-4">

                    {{--------------Фото-------------------------------------------------------------------------------------}}

                <div class="mb-3">
                    <form method='POST' action="{{ action('ProfileController@store') }}" class="mb-0 bg-white"  enctype="multipart/form-data">
                        @csrf
                        {{ method_field("PUT") }}

                        <div class="row p-4 bg-white">
                            <div class="col mb-0">
                                <h3 class="h5 text-black">Мое фото</h3>
                            </div>
                        </div>

                        <div class="row bg-white">
                            <div class="col mb-2 text-center">
                                <label for="file">
                                    {{--<img id="img_photo" src="{{ asset("{$avatar_src}") }}" alt="Image"--}}
                                         {{--class="img-fluid rounded-circle avatar">--}}
                                    <img id="img_p" src="{{ asset("{$avatar_src}") }}" alt="Image"
                                         class="img-fluid rounded-circle avatar">
                                </label>
                            </div>
                        </div>

                        <div class="row bg-white text-center">
                            <div class="col" style="padding-top: 0px!important;padding-bottom: 0px!important;">
                                <label for="file" class="btn btn-primary text-white px-4 py-2">Выбрать</label>
                                <input type="file" name="file" id="file" hidden>

                                {{--@if ($errors->has('file'))--}}
                                    {{--<span>{{ $errors->file }}</span>--}}
                                {{--@endif--}}
                            </div>

                            <div class="col"  id="choose_btn_div" style="padding-top: 0px!important;padding-bottom: 0px!important;">
                                <input id="choose_btn" type="submit" value="Изменить"
                                       class="btn btn-primary-inactive text-white px-4 py-2">
                            </div>

                        </div>
                        <div class="row bg-white" style="padding-top: 0px!important;padding-bottom: 10px!important;">
                            <div class="col text-center">
                                <span id="choosed"></span>
                                <small class="text-black"><br />Рекомендуемый размер: 500*500 px</small>
                                <small class="text-black"><br />Допустимые форматы: jpeg, gif, png</small>
                            </div>
                        </div>
                    </form>
                </div>

{{-----------------------------Пароль-------------------------------------------------}}
                <div class="mb-3 align-center">

                    <form method="POST" action="{{ action('ProfileController@edit') }}">
                        @csrf
                        {{ method_field("PUT") }}
                        {{--------------------------Mail--hidden-------------------------------------------}}
                        <input id="email" type="email" name="email" value="{{ $email }}" required autocomplete="email" hidden>
                        {{---------------------------------------------------------------------}}
                        <div class="row p-4 bg-white" style="padding-bottom: 0px!important;">
                            <div class="col mb-0">
                                <h3 class="h5 text-black">Изменить пароль</h3>
                            </div>
                        </div>

                        <div class="row p-2 bg-white">
                            <div class="col mb-0">
                            <label for="password" class="font-weight-bold">{{ __('Новый пароль') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row p-2 bg-white">
                            <div class="col">
                            <label for="password-confirm" class="font-weight-bold">{{ __('Повторите пароль') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row p-2 bg-white" style="padding-bottom: 0px!important;">
                            <div class="col  mb-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Установить новый пароль') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

{{----------------------------------}}
                </div>

                {{--------------------------личные данные-------------------------------------------}}

                <div class="col-lg-8 mb-3">
                    <div class="p-4 bg-white  mb-3">
                        <h3 class="h5 text-black mb-3">Мои личные данные</h3>
                        {{--<div class="col-md-12 col-lg-8 mb-5  bg-white">--}}
                        <form method='POST' action="{{ action('ProfileController@update',
                        ['id'=>Auth::user()->getAuthIdentifier()]) }}" class="mb-0 bg-white">
                            @csrf
                            {{ method_field("PUT") }}

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="surname">Фамилия</label>
                                    <input type="text" name="surname" id="surname" class="form-control"
                                           placeholder="Фамилия"
                                           value="{{ old('surname', $surname) }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="name">Имя</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Имя"
                                           value="{{ old('name', $name) }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="middle_name">Отчество</label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control"
                                           placeholder="Отчество"
                                           value="{{ old('middle_name', $middle_name) }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="email">Email
                                       (при изменении email, Вы должны будете подтвердить новый email.
                                        <br />Без подтверждения Личный кабинет будет недоступен!)</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                           value="{{ old('email', $email) }}">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Телефон</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                           placeholder="8(___) ___-__-__"
                                           value="{{ old('phone', $phone) }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="birthdate">Дата роджения</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control"
                                           placeholder="гггг.мм.дд"
                                           value="{{ old('birthdate', $birthdate) }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Изменить" class="btn btn-primary text-white px-4 py-2">
                                </div>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
