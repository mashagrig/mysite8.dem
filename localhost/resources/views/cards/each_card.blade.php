<?php
$count = 1;
$status = '';
?>
{{--описание каждой программы--}}




@foreach($arr as $k=>$v)
    <?php

    $card_id = $arr[$k]['card_id'];
    $file = $arr[$k]['file'];
    $price = $arr[$k]['price'];
    $title = $arr[$k]['title'];
    $text = $arr[$k]['text'];
    $link = $arr[$k]['link'];

    if($status_card->where('status_card_id', $card_id)->first() !== null){
        $status = $status_card->where('status_card_id', $card_id)->first()->status_card;
    }

    $status_color = '';
    $status_check_style = '';
    $message = '';

    switch ($status) {
        case "active":
            $status = "Активна";
            $status_check_style = 'd-none';
            $message = 'Данная карта находится в статусе "Активна для Вашего профиля".';
            break;
        case "inactive":
            $status = "Не активна";
            break;
        case "cancelled":
            $status = "Заявка на карту отменена";
            break;
        case "expired":
            $status = "Истек срок действия";
            break;
        case "awaiting":
            $status = "Ожидает подтверджения";
            $status_color = "#fd7e14";
            $status_check_style = 'd-none';
            $message = 'Данная карта находится в статусе "Ожидания подтверждения для Вашего профиля".';
            break;
    }
    ?>

        <div id="{{ $link }}" class="site-section">
            <div class="container"><p><br/></p>
                <div class="row">

                    @if($count%2 === 0)
                    <div class="col-lg-6">
                        <p class="mb-5"><img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid"></p>
                    </div>
                    @endif

                    <div class="col-lg-5 ml-auto">
                        <h2 class="site-section-heading mb-3">{{ $title }}</h2>
                        <h2 class="site-section-heading mb-3 orange">{{ $price }}</h2>
                        <p class="mb-4">{{ $text }}</p>
                        {{-------------------отправка письма о заказе карты----------------}}


                        @guest()
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    @guest
                                        <p>Для отправки заявки на получении клубной карты Вам необходимо
                                            <a class="a-link" href="{{ route('register') }}">зарегистрироваться</a>
                                            или
                                            <a class="a-link" href="{{ route('login') }}">авторизоваться</a>
                                        </p>
                                    @endguest
                                </div>
                            </div>
                        @endguest


                        @can("manipulate", "App\SheduleUser")
                            <p class="orange">{{ $message }}</p>
                            <form method='POST' action="{{ action('SignupCardController@store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <label for="card_id" class="row">
                                            <input id="card_id" type="checkbox"
                                                   name="card_id"
                                                   value="{{ $card_id }}" hidden checked>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="submit" class="btn btn-outline-primary py-2 px-4 {{ $status_check_style }}" value="Заказать">
                                    </div>
                                </div>
                            </form>
                        @endcan
                        {{-------------------------------------------------------------------------}}
                    </div>

                        @if($count%2 !== 0)
                        <div class="col-lg-6">
                            <p class="mb-5"><img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid"></p>
                        </div>
                        @endif

                </div>
            </div>
        </div>
    <?php $count++; ?>
@endforeach

