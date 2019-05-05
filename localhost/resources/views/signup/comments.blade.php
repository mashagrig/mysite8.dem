@extends('privacy')
@section('comments')
    <div class="site-section  block-14 bg-light nav-direction-white">
        <div class="container">
            <div class="row  mb-3">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center">Мои отзывы</h2>
                </div>
            </div>



            {{-----------------------------------------------------------------------}}
            <div class="row">

                <div class="col-lg-12">
                    <div class="p-4 bg-white  mb-3">
                        <h3 class="h5 text-black mb-3">Добавить отзыв</h3>
                        {{--<div class="col-md-12 col-lg-8 mb-5  bg-white">--}}
                        <form method='POST' action="{{ action('contacts\ContactsController@store') }}" class="mb-0 bg-white">
                            @csrf

                            <?php
                            $email = '';
                            $name = '';
                            $phone = '';

                            if(Auth::user()!== null){
                                $email = Auth::user()->email;
                                if( Auth::user()->personalinfo_id !== null){
                                    $name = Auth::user()->personalinfo()->get('name')[0]->name;
                                    $phone = Auth::user()->personalinfo()->get('telephone')[0]->telephone;
                                }
                            }

                            ?>


                            <div class="row form-group" hidden>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="name">Ваше имя</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Имя"
                                           value="{{ old('name', $name) }}">
                                </div>
                            </div>
                            <div class="row form-group" hidden>
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                           value="{{ old('email', $email) }}">
                                </div>
                            </div>


                            <div class="row form-group" hidden>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Телефон</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Телефон"
                                           value="{{ old('phone', $phone) }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="message">Сообщение</label>
                                    <textarea name="message" name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Сообщение..."></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Отправить" class="btn btn-primary text-white px-4 py-2">
                                </div>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------}}

            {{--@foreach($arr as $k=>$v)--}}
            <div class="row right">
                <div class="col-lg-4"></div>
                <div class="col-lg-8 mb-4 right">
                    <p>Мой отзыв</p>
                    <div class="border p-4 text-with-icon  bg-white">
                        <p>рмоьрмлооилоил оилооооооооооооооооооооо оооооооооооооооооо оооооооооооооооо оооооооо</p>
                    </div>
                </div>
            </div>
            {{--@endforeach--}}
            {{--@foreach($arr as $k=>$v)--}}
            <div class="row left">
                <div class="col-lg-8 mb-4 left">
                    <p>Мой отзыв</p>
                    <div class="border p-4 text-with-icon  bg-white">
                        <p>рмоьрмлооилоилои лоооооооооооооооооооооооо ооооооооооооооооо оооооооооооооо оооооооо</p>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
            {{--@endforeach--}}

            {{---------------------------------------------------------------------------}}

        </div>
    </div>
@endsection
