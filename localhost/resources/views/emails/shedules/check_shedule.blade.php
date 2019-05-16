
<?php
$now_check_shedules = Array();
$now_check_shedules_dates = Array();
$now_max_date_select = Array();

foreach ($each_check_shedule_info as $kk => $singup) {
    foreach ($singup as $k => $v) {

        if(in_array($singup[$k]['shedule_id'], $shedule_id)){

                $now_check_shedules[] =
                [
                    'shedule_id' => $singup[$k]['shedule_id'],
                    'date_training' => $singup[$k]['date_training'],
                    'section_title' => $singup[$k]['section_title'],
                    'start_training' => $singup[$k]['start_training'],
                    'stop_training' => $singup[$k]['stop_training'],
                    'trainer_name' => $singup[$k]['trainer_surname']
                        ." ".$singup[$k]['trainer_name']
                        ." ".$singup[$k]['trainer_middle_name'],
                    'gym_number' => $singup[$k]['gym_number'],
                ];

            array_push(
                $now_check_shedules_dates,
                $singup[$k]['date_training']);
        }
    }
}
$now_max_date_select = array_unique($now_check_shedules_dates);
?>

@component('mail::message')

#### Спасибо, что выбрали наш клуб!
Вы записались на тренировку:
@foreach($now_max_date_select as $k =>$date)
<?php
                    setlocale(LC_TIME, 'ru_RU.utf8');
                    $format_date = strftime("%a %e %B %G", strtotime($date));
?>
{{--Запись на <b>{{ $format_date }}</b>--}}
@foreach($now_check_shedules as $kk=>$singup)
@if((strtotime($singup['date_training']) === strtotime($date)))
<?php
                                    $section = $singup['section_title'];

                                    switch ($singup['section_title']) {
                                        case "morning_programs":
                                            $section = "Утренние программы";
                                            break;
                                        case "body_building":
                                            $section = "Боди билдинг";
                                            break;
                                        case "stretching":
                                            $section = "Стретчинг";
                                            break;
                                        case "fitness":
                                            $section = "Фитнес";
                                            break;
                                        case "yoga":
                                            $section = "Йога";
                                            break;
                                        case "child_programs":
                                            $section = "Детсткие программы";
                                            break;
                                    }
?>
@component('mail::panel')
@component('mail::table')
| Запись на дату: | <b>{{ $format_date }}</b>       |
|:--------------| :-------------------------|
| <small>Время</small>   | {{ date_format(date_create($singup['start_training']), 'H:i') }} - {{ date_format(date_create($singup['stop_training']), 'H:i') }} |
| <small>Тренер</small>  | {{ $singup['trainer_name'] }} |
| <small>Секция</small>  | {{ $section }} |
| <small>№ зала</small>  | {{ $singup['gym_number'] }} |
@endcomponent
@endcomponent
@endif
@endforeach
@endforeach

<small>В ближайшее время наш менеджер свяжется с Вами для уточнения записи.</small>

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
