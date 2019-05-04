<?php
$cards_to_destroy = array();
foreach ($card_id as $id){
    $cards = $card_arr->where('card_id', $id)->first();
    $cards_to_destroy[] = [
       // 'card_id' => $cards->card_id,
        'card_title' => $cards->card_title,
      //  'card_count_month' => $cards->card_count_month,
      //  'card_count_day' => $cards->card_count_day,
        'card_price' => $cards->card_price,
    ];
}
?>


@component('mail::message')

#### Спасибо, что выбрали наш клуб!

@foreach($cards_to_destroy as $k=>$singup)
<?php
        switch ($singup['card_title']) {
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
@component('mail::panel')
Вы отменили заказ на карту <b>&laquo;{{ $card_type }}&raquo;</b>.

Цена карты от {{ number_format($singup['card_price'], 0, '', ' ') }} руб.
<small><br />(Цена может быть изменена по согласованию с менеджером клуба.)</small>

@endcomponent
@endforeach

<small>В ближайшее время наш менеджер свяжется с Вами для уточнения отмены заказа.</small>

@component('mail::button', ['url' => route('login')])
Смотреть подробнее в личном кабинете
@endcomponent
@component('mail::panel')
<small>Контакная информация клуба {{ config('app.name') }}<br />
Адрес: г.Москва, ул. Правды, д.1<br />
&#9742; <a class="a-link" href="{{ __('+7-(999)-876-54-32') }}">+7-(999)-876-54-32</a><br />
&#9993; <a class="a-link" href="mailto:support@sportfit.ru">support@sportfit.ru</a></small>
@endcomponent

#### С уважением, {{ config('app.name') }}

<small>Не отвечайте на данное письмо</small>
@endcomponent

