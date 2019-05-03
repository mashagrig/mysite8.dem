
@component('mail::message')
    Спасибо, что выбрали наш клуб!

    Вы обратились с вопросом на сайт ...
    В ближайшее время наш менеджер ответит Вам.

    @component('mail::button', ['url' => route('login')])
        Смотреть подробнее в личном кабинете
    @endcomponent

    С уважением,
    {{ config('app.name') }}
@endcomponent
