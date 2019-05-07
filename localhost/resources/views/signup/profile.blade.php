<?php

$surname = '';
$name = '';
$middle_name = '';
$email = '';
$phone = '';
$birthdate = '';
$binaryfiles_file_src = '';

$surname = $profiles[0]->personalinfos_surname;
$name = $profiles[0]->personalinfos_name;
$middle_name = $profiles[0]->personalinfos_surname;
$email = $profiles[0]->users_name;
$phone = $profiles[0]->personalinfos_telephone;
$birthdate = $profiles[0]->personalinfos_birthdate;
$binaryfiles_file_src = $profiles[0]->binaryfiles_file_src;

//if(Auth::user()!== null){
//    $email = Auth::user()->email;
//    if( Auth::user()->personalinfo_id !== null){
//        $surname = Auth::user()->personalinfo()->get('surname')[0]->surname;
//        $name = Auth::user()->personalinfo()->get('name')[0]->name;
//        $middle_name = Auth::user()->personalinfo()->get('middle_name')[0]->middle_name;
//        $phone = Auth::user()->personalinfo()->get('telephone')[0]->telephone;
//        $birthdate = Auth::user()->personalinfo()->get('birthdate')[0]->birthdate;
//    }
////if( Auth::user()->hasMany('binaryfiles')){
////  //  $binaryfiles_file_src = Auth::user()->whereHas('binaryfile')->get('binaryfiles_file_src')[0]->binaryfiles_file_src;
////}
//}

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


                <div class="col-lg-4">
                    <form method='POST' action="{{ action('ProfileController@store') }}" class="mb-0 bg-white">
                        @csrf

                        <div class="row p-4 bg-white">
                            <div class="col">
                                    <h3 class="h5 text-black">Мое фото</h3>
                                </div>
                        </div>

                        <div class="row bg-white">
                                <div class="col mb-3 text-center">
                                   <img src="{{ asset("{$binaryfiles_file_src}") }}" alt="Image"
                                            class="img-fluid rounded-circle" style="width: 100px!important;">
                                </div>
                         </div>


                        <div class="row bg-white text-center">
                                <div class="col mb-5">
                                    <input type="submit" value="Выбрать" class="btn btn-primary text-white px-4 py-2">
                                </div>
                                <div class="col mb-5">
                                    <input type="submit" value="Изменить" class="btn btn-primary-inactive text-white px-4 py-2">
                                </div>

                        </div>
                    </form>
                 </div>



                <div class="col-lg-8">
                    <div class="p-4 bg-white  mb-3">
                        <h3 class="h5 text-black mb-3">Мои личные данные</h3>
                        {{--<div class="col-md-12 col-lg-8 mb-5  bg-white">--}}
                        <form method='POST' action="{{ action('ProfileController@store') }}" class="mb-0 bg-white">
                            @csrf

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
                            $date_b = date_format(date_create($birthdate), 'd') . "." .
                                date_format(date_create($birthdate), 'm') . '.' .
                                date_format(date_create($birthdate), 'Y');
                            ?>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="birthdate">Дата роджения</label>
                                    <input type="text" name="birthdate" id="birthdate" class="form-control"
                                           placeholder="День"
                                           value="{{ old('birthdate', $date_b) }}">
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
