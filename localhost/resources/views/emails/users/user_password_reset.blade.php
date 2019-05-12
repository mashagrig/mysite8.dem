
@component('mail::message')

#### Спасибо, что выбрали наш клуб!

@component('mail::panel')
Вы зарегистрировались на сайте спорт-клуба <b>SportFit</b>.

Для Вас определен временный токен для входа в личный кабинет <b>**{{ $token }}**</b>
<small><br />(Пароль действителен в течении суток)</small>

@endcomponent

<small>Обязательно измените данный пароль на более надежный в своем "Личном кабинете"!</small>

@component('mail::button', ['url' => route('password.reset', $token)])
 Войти на сайт
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

