<?php

$count=1;

$status_comment = '';
$status_color = '';
$status_tr_style = '';

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
                        <form method='POST' action="{{ action('CommentsController@store') }}" class="mb-0 bg-white">
                            @csrf

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
                                    <label class="font-weight-bold" for="message" hidden>Сообщение</label>
                                    <textarea name="message" name="message" id="message" cols="30" rows="4" class="form-control" placeholder="Отзыв..."></textarea>
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
        @foreach($comments
        ->where('contents.status', 'like', '%public%')
        ->where('contents.status', 'like', '%moderating%', "or")
        ->where('contents.status', 'like', '%denied%', "or")
        ->get()
             as $comment)

            <?php
                switch ($comment->status_content){
                    case "moderating":
                        $status_comment = 'После проверки модератором отзыв будет опубликован на сайте';
                        $status_color = "#fd7e14";
                        $status_tr_style = 'table-light-new';
                        break;
                    case "public":
                        $status_comment = 'Отзыв опубликован';
                        $status_color = "";
                        $status_tr_style = '';
                        break;
                    case "denied":
                        $status_comment = 'Отзыв отклонен модератором';
                        $status_color = "red";
                        $status_tr_style = 'table-secondary-new';
                        break;
                }
                ?>


            <div class="row">
                @if($count%2 === 0)
                <div class="col-lg-4"></div>
                @endif
                <div class="col-lg-8 mb-4">
                    <p>Мой отзыв от {{date_format(date_create($comment->contents_updated_at), 'd-m-Y H:i')}}
                        &bullet; <span  style="color: {{$status_color}}!important;">{{ $status_comment }}</span></p>
                    <div class="border p-4 text-with-icon  bg-white {{ $status_tr_style }}">
                        <p>&ldquo;{{ $comment->contents_text }}&rdquo;</p>
                    </div>
                </div>
                    @if($count%2 === 0)
                        <div class="col-lg-4"></div>
                    @endif
            </div>
                <?php $count++?>
            @endforeach

            {{---------------------------------------------------------------------------}}

        </div>
    </div>
@endsection
