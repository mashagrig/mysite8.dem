
@component('mail::message')

#### Спасибо, что выбрали наш клуб!

@component('mail::panel')
Вы можете изменить текущий пароль Вашего Личного кабинета на сайте спорт-клуба <b>SportFit</b>, перейдя по ссылке ниже.

<small><br />(Ссылка действительна в течении суток)</small>

@endcomponent
@component('mail::button', ['url' => route('password.reset', $token)])
Перейти на страницу сброса пароля
@endcomponent

@component('mail::panel')
<small>Контакная информация клуба {{ config('app.name') }}<br />
Адрес: г.Москва, ул. Правды, д.1<br />
&#9742; <a class="a-link" href="{{ __('+7-(999)-876-54-32') }}">+7-(999)-876-54-32</a><br />
&#9993; <a class="a-link" href="mailto:support@sportfit.ru">support@sportfit.ru</a></small>

@endcomponent

#### С уважением, {{ config('app.name') }}

<small>Не отвечайте на данное письмо.<br />
Если Вам не удалось перейти по ссылке, скопируйте ссылку, указанную же в строку поиска Вашего веб-браузера:<br />
<a href="{{ route('password.reset', $token) }}">{{ route('password.reset', $token) }}</a></small>
@endcomponent

