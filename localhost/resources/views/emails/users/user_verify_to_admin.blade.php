
@component('mail::message')

#### Спасибо, что выбрали наш клуб!

@component('mail::panel')
Email {{ $email }} нового пользователя с id={{ $id }} был верифицирован на сайте спорт-клуба <b>SportFit</b>.

<small><br />Теперь ему доступны все услуги.</small>
@endcomponent

@component('mail::button', ['url' => route('login')])
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

