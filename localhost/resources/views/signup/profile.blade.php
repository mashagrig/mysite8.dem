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
    $profiles_user = $profiles;//->where('users.id', "{$current_user_id}");

    if($profiles_user !== null){
        $surname =  $profiles_user[0]->personalinfos_surname;
        $name = $profiles_user[0]->personalinfos_name;
        $name = $profiles_user[0]->personalinfos_name;
        $middle_name = $profiles_user[0]->personalinfos_surname;
        $email = $profiles_user[0]->users_email;
        $phone = $profiles_user[0]->personalinfos_telephone;
        $birthdate = $profiles_user[0]->personalinfos_birthdate;
    }


    $b_id_arr = \App\Binaryfile::
    whereHas('users', function ($q) use ($current_user_id) {
        $q->where('users.id', '=', "{$current_user_id}");
    })
        ->where('title', 'like', "%avatar%")
        ->pluck('file_src')
        ->toArray();
    if (!empty($b_id_arr)) {
        $binaryfiles_file_src = $b_id_arr[0];
    }
}


?>

@extends('privacy')
@section('profile')

    <div class="site-section  block-14 bg-light nav-direction-white">
        <div class="container">
            <div class="row  mb-3">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center">Мой профиль</h2>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-4 mb-3">
                    <form method='POST' action="{{ action('ProfileController@store') }}" class="mb-0 bg-white"  enctype="multipart/form-data">
                        @csrf
                        {{ method_field("PUT") }}

                        <div class="row p-4 bg-white">
                            <div class="col">
                                <h3 class="h5 text-black">Мое фото</h3>
                            </div>
                        </div>

                        <div class="row bg-white">
                            <div class="col mb-3 text-center">
                                <label for="file">
                                    <img id="img_photo" src="{{ asset("{$binaryfiles_file_src}") }}" alt="Image"
                                         class="img-fluid rounded-circle" style="width: 140px!important; cursor: pointer;">
                                </label>
                            </div>
                        </div>

                        <div class="row bg-white text-center">
                            <div class="col mb-5">
                                <label for="file" class="btn btn-primary text-white px-4 py-2">Выбрать</label>
                                <input type="file" name="file" id="file" hidden>

                                {{--@if ($errors->has('file'))--}}
                                    {{--<span>{{ $errors->file }}</span>--}}
                                {{--@endif--}}
                            </div>

                            <div class="col mb-5">
                                <input id="choose_btn" type="submit" value="Изменить"
                                       class="btn btn-primary-inactive text-white px-4 py-2">
                            </div>

                        </div>
                        <div class="row bg-white">
                            <div class="col mb-3 text-center">
                                <span id="choosed"></span>
                            </div>
                        </div>
                    </form>
                </div>

{{---------------------------------------------------------------------------------------------------}}
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
                                    <label class="font-weight-bold" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                           value="{{ old('email', $email) }}">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Телефон</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                           placeholder="Телефон"
                                           value="{{ old('phone', $phone) }}">
                                </div>
                            </div>

                            <?php
//                            $date_b = date_format(date_create($birthdate), 'd') . "." .
//                                date_format(date_create($birthdate), 'm') . '.' .
//                                date_format(date_create($birthdate), 'Y');
                            ?>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="birthdate">Дата роджения</label>
                                    <input type="text" name="birthdate" id="birthdate" class="form-control"
                                           placeholder="День"
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
