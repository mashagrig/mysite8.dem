<?php

$cards = $card_arr->where('card_id', $card_id)->first();
$card_id = $cards->card_id;
$card_title = $cards->card_title;
$card_count_month = $cards->card_count_month;
$card_count_day = $cards->card_count_day;
$card_price = $cards->card_price;

switch ($card_title) {
    case "year":
        $card_type = "1 год";
        break;
    case "6month":
        $card_type = "6 месяцев";
        break;
    case "3month":
        $card_type = "3 месяца";
        break;
    case "1month":
        $card_type = "1 месяц";
        break;
    case "personal":
        $card_type = "Персональная карта";
        break;
    case "child":
        $card_type = "Детсткая карта";
        break;
}
?>


@component('mail::message')


                <div class="container">

                    <div class="row mb-5">
                        <h3>Спасибо, что выбрали наш клуб!</h3>
                    </div>

                    <div class="row mb-5">
                        <div class="card card-body">
                            <p>Вы заказали карту &laquo;{{ $card_type }}&raquo;.</p>
                            <p>Цена карты от {{ number_format($card_price, 0, '', ' ') }} руб.<br />
                            <small>(Цена может быть изменена по согласованию с менеджером клуба.)</small></p>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <small>В ближайшее время наш менеджер свяжется с Вами для уточнения заказа.</small>

                            @component('mail::button', ['url' => route('login')])
                                Смотреть подробнее в личном кабинете
                            @endcomponent

                            <small>Контакная информация клуба {{ config('app.name') }}<br />
                                Адрес: г.Москва, ул. Правды, д.1<br />
                                &#9742; <a class="a-link" href="tel:{{ __('+7-(999)-876-54-32') }}">+7-(999)-876-54-32</a><br />
                                &#9993; <a class="a-link" href="mailto:support@sportfit.ru">support@sportfit.ru</a></small>

                            <p></p>
                            <h3>С уважением, {{ config('app.name') }}</h3>
                            <p><br /></p>
                            <small>Не отвечайте на данное письмо</small>
                        </div>
                    </div>
                </div>
@endcomponent

