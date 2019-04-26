
@component('mail::message')
 Спасибо, что выбрали наш клуб!

Вы заказали карту ...

@component('mail::button', ['url' => route('login')])
Смотреть подробнее в личном кабинете
@endcomponent

С уважением,<br>
{{ config('app.name') }}
@endcomponent

