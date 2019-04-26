@component('mail::message')
# Спасибо, что выбрали наш клуб!

Вы заказали карту ...

@component('mail::button', ['url' => route('cards')])
Смотреть подробнее о карте
@endcomponent

С уважением,<br>
{{ config('app.name') }}
@endcomponent

