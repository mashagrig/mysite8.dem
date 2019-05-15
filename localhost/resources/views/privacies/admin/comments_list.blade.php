
@if(isset($comments))

<?php

$count=1;

$status_comment = '';
$status_color = '';
$status_tr_style = '';

$email = '';
$name = '';
$phone = '';

$current_user = '';
$comments_user = '';

if(Auth::user()!== null){
    $email = Auth::user()->email;
    $current_user = Auth::user()->getAuthIdentifier();
    if( Auth::user()->personalinfo_id !== null){
        $name = Auth::user()->personalinfo()->get('name')[0]->name;
        $phone = Auth::user()->personalinfo()->get('telephone')[0]->telephone;
    }
}

$comments_user = $comments
    ->where('content_user.user_id', "{$current_user}")
    ->get();

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
                                    <textarea  name="message" id="message" cols="30" rows="4" class="form-control" placeholder="Отзыв..."></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Добавить" class="btn btn-primary text-white px-4 py-2">
                                </div>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------}}
            @foreach($comments_user  as $comment)

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
@endif
