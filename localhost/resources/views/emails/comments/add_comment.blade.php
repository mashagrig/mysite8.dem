@component('mail::message')

#### Спасибо, что выбрали наш клуб!
@component('mail::panel')
Вы оставили отзыв о нашем клубе:
<small><br />&laquo;{{ $comment }}&raquo;.</small>
@endcomponent
Ваше мнение очень важно для нас!<br />
<small>В ближайшее время Ваш отзыв будет опубликован на сайте.</small>

@component('mail::button', ['url' => route('login')])
Смотреть подробнее в личном кабинете
@endcomponent
@component('mail::panel')
<small>Контакная информация клуба {{ config('app.name') }}<br />
Адрес: г.Москва, ул. Правды, д.1<br />
&#9742; <a href="{{ __('+7-(999)-876-54-32') }}">+7-(999)-876-54-32</a><br />
&#9993; <a href="mailto:support@sportfit.ru">support@sportfit.ru</a></small>
@endcomponent

#### С уважением, {{ config('app.name') }}

<small>Не отвечайте на данное письмо</small>
@endcomponent
