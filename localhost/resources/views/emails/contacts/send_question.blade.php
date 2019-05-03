
@component('mail::message')


    <div class="container">

        <div class="row mb-5">
            <h3>Спасибо, что выбрали наш клуб!</h3>
        </div>

        <div class="row mb-5">
            <div class="card card-body">
                <p>Вы обратились на сайт  с вопросом: <br />
                    <small>&laquo;{{ $question }}&raquo;.</small>
                </p>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <small>В ближайшее время наш менеджер ответит Вам.</small>

                @component('mail::button', ['url' => route('login')])
                    Смотреть подробнее в личном кабинете
                @endcomponent

                <small>Контакная информация клуба {{ config('app.name') }}<br />
                    Адрес: г.Москва, ул. Правды, д.1<br />
                    &#9742; <a class="a-link" href="{{ __('+7-(999)-876-54-32') }}">+7-(999)-876-54-32</a><br />
                    &#9993; <a class="a-link" href="mailto:support@sportfit.ru">support@sportfit.ru</a></small>

                <p></p>
                <h3>С уважением, {{ config('app.name') }}</h3>
                <p><br /></p>
                <small>Не отвечайте на данное письмо</small>
            </div>
        </div>
    </div>
@endcomponent
