@if(isset($shedule_for_date) && $shedule_for_date!=='')
@if(isset($max_date_select) && $max_date_select!=='')


    @can("manipulate", "App\SheduleUser")
        {{--<form method='POST' action="{{ action('shedule\SheduleController@store') }}" class="row">--}}
        <form method='POST' action="{{ action('SignupController@store') }}" class="row">

            @csrf
            @endcan

            <?php $format_date = '';?>

{{--Для каждой уникальной даты из расписания создаем таблицу--}}
@foreach($max_date_select as $k =>$date)

    <?php
//  $format_date =  date_format(date_create($date), 'd-m-Y');
    setlocale(LC_TIME, 'ru_RU.utf8');
    $format_date = strftime("%a %e %B %G", strtotime($date));
    ?>

    <span class="text-black">Расписание на  &bullet; <strong>{{ $format_date }}</strong></span>

{{--<table class="table table-striped">--}}
<table class="table  table-hover">
    <thead class="text-black thead-dark">
    <tr>


        <th scope="col" style="width: 20%!important;">Время</th>
        <th scope="col" style="width: 30%!important;">Программа</th>
        <th scope="col">Тренер</th>
        <th scope="col" style="width: 10%!important;">№ зала</th>

        @can("manipulate", "App\SheduleUser") <th scope="col">Записаться</th> @endcan
    </tr>
    </thead>
    <tbody>


        {{--Для каждой записи (неуникальной) из расписания--}}
        @foreach($shedule_for_date as $shedule)

            {{--Для каждой уникальной даты из расписания выводим все записи для этой даты--}}
            @if((strtotime($shedule->date_training) === strtotime($date)))

                <?php
                    $section = $shedule->section_title;

                    switch ($shedule->section_title){
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
                $status = '';
                if($status_shedule->where('status_shedule_id', $shedule->shedule_id)->first() !== null){
                    $status = $status_shedule->where('status_shedule_id', $shedule->shedule_id)->first()->status_shedule;
                }

                $status_color = '';
                $status_check_style = '';
                $status_tr_style = 'table-light-new';
                $message = '';

                switch ($status) {
                    case "confirmed":
                        $status = "Запись подтверждена";
                        $status_tr_style = 'table-warning-new';
                        $status_check_style = 'd-none';
                        $message = $status;
                        break;
                    case "cancelled":
                        $status = "Запись отменена";
                        $status_tr_style = 'table-secondary-new';
                        $status_check_style = 'd-none';
                        break;
                    case "visited":
                        $status = "Тренировка посещена";
                        $status_tr_style = 'table-secondary-new';
                        $status_check_style = 'd-none';
                        break;
                    case "notvisited":
                        $status = "Тренировка не была посещена";
                        $status_tr_style = 'table-secondary-new';
                        $status_check_style = 'd-none';
                        break;
                    case "awaiting":
                        $status = "Ожидает подтверджения";
                        $status_color = "#fd7e14";
                        $status_tr_style = 'table-light-new';
                        $status_check_style = 'd-none';
                        $message = $status;
                        break;
                }
                ?>
                <tr class="{{ $status_tr_style }}">
            {{--<td>{{ date_format(date_create($shedule->date_training), 'd-m-Y') }}</td>--}}
            <td>{{ date_format(date_create($shedule->start_training), 'H:i') }} - {{ date_format(date_create($shedule->stop_training), 'H:i') }}</td>
                    <td>{{ $section }}</td>
            <td>
                {{      $shedule->trainer_surname
                ." ". $shedule->trainer_name
                ." ". $shedule->trainer_middle_name }}
            </td>
            <td>{{ $shedule->gym_number }}</td>

            @can("manipulate", "App\SheduleUser")
                <td>
                <span style="color: {{$status_color}}!important;">{{ $message }}</span>
                    <label for="check_shedule_id">
                        <input id="check_shedule_id"
                               type="checkbox"
                               name="check_shedule_id[]"
                               value="{{ $shedule->shedule_id }}"
                               class="{{ $status_check_style }}">
                        {{--{{ $shedule->shedule_id }}--}}
                    </label>
                </td>
            @endcan
        </tr>
            @endif
        @endforeach

    </tbody>
</table>
    @endforeach

     @can("manipulate", "App\SheduleUser")
       @if($format_date!=='')
            <div class="col text-md-right  mb-3">
                <input id="btn" type="submit" class="btn btn-primary rounded text-white px-4" value="Записаться">
            </div>
       @endif
        </form>
    @endcan


@endif
@endif
