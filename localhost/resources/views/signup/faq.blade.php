<?php
$email = '';
$name = '';
$phone = '';

if (Auth::user() !== null) {
    $email = Auth::user()->email;
    if (Auth::user()->personalinfo_id !== null) {
        $name = Auth::user()->personalinfo()->get('name')[0]->name;
        $phone = Auth::user()->personalinfo()->get('telephone')[0]->telephone;
    }
}

?>
@extends('privacy')
@section('faq')
    <div class="site-section  block-14 bg-light nav-direction-white">
        <div class="container">
            <div class="row  mb-3">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center">Обратная связь</h2>
                </div>
            </div>


            {{---------------------------------------------------------------------------}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="p-4 bg-white  mb-3">
                        <h3 class="h5 text-black mb-3">Задать вопрос</h3>
                        {{--<div class="col-md-12 col-lg-8 mb-5  bg-white">--}}
                        <form method='POST' action="{{ action('contacts\ContactsController@store') }}"
                              class="mb-0 bg-white">
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
                                    <input type="text" name="phone" id="phone" class="form-control"
                                           placeholder="Телефон"
                                           value="{{ old('phone', $phone) }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="message" hidden>Сообщение</label>
                                    <textarea name="message" name="message" id="message" cols="30" rows="4"
                                              class="form-control" placeholder="Вопрос..."></textarea>
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
            @foreach($question_from_contacts
        ->where('contents.status', 'like', '%public%')
        ->where('contents.status', 'like', '%moderating%', "or")
        ->where('contents.status', 'like', '%denied%', "or")

        ->get()
         as $question)
                <?php
                switch ($question->status_content){
                    case "moderating":
                        $status_comment = 'В ближайшее время менеджер ответит на Ваш вопрос';
                        $status_color = "#fd7e14";
                        $status_tr_style = 'table-light-new';
                        break;
                    case "public":
                        $status_comment = '';
                        $status_color = "";
                        $status_tr_style = '';
                        break;
                    case "denied":
                        $status_comment = 'Вопрос отклонен модератором';
                        $status_color = "red";
                        $status_tr_style = 'table-secondary-new';
                        break;
                }
                ?>
            <div class="row right">
                <div class="col-lg-4"></div>
                <div class="col-lg-8 mb-4 right">{{$question->contents_id}}
                    <p>Мой впорос от {{date_format(date_create($question->contents_updated_at), 'd-m-Y H:i')}}
                        &bullet; <span  style="color: {{$status_color}}!important;">{{ $status_comment }}</span></p>
                    <div class="border p-4 text-with-icon  bg-white {{ $status_tr_style }}">
                        <p>&ldquo;{{ $question->contents_text }}&rdquo;</p>
                    </div>
                </div>
            </div>


                        {{---------------------------------------------------------------------------}}
                        @foreach($answers as $answer)
                            @if($question->contents_id === (int)$answer->question_id)
                            <div class="row left">
                                <div class="col-lg-8 mb-4 left">{{$answer->question_id}}
                                    <p>Ответ на мой вопрос от {{date_format(date_create($answer->contents_updated_at), 'd-m-Y H:i')}}</p>
                                    <div class="border p-4 text-with-icon  bg-white">
                                        <p>&ldquo;{{ $answer->contents_text }}&rdquo;</p>
                                    </div>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        @endif
                        @endforeach

                        {{---------------------------------------------------------------------------}}

            @endforeach



        </div>
    </div>
@endsection


{{--<a href="{{ route("programs") }}#{{ $link }}">--}}
{{--<span class="{{ $icon }} icon display-4 mb-4 d-block"></span>--}}
{{--</a>--}}
{{--<p></p>--}}
{{--<h2 class="h5">{{ $title }}</h2>--}}
{{--<h2 class="orange">{{ $price }}</h2>--}}
{{--<p>{{ $text }}</p>--}}
{{--<div class="row">--}}
{{--<div class="col">--}}
{{--<p><a class="a-link" href="{{ route("cards") }}#{{ $link }}">Подробнее</a></p>--}}
{{--</div>--}}
{{--<div class="col">--}}
{{--<p><a class="a-link" href="{{ route("cards") }}#{{ $link }}">Заказать</a></p>--}}
{{--</div>--}}
{{--</div>--}}
