@if(isset($shedule_for_date) && $shedule_for_date!=='')
@if(isset($max_date_select) && $max_date_select!=='')


    @can("manipulate", "App\SheduleUser")
        {{--<form method='POST' action="{{ action('shedule\SheduleController@store') }}" class="row">--}}
        <form method='POST' action="{{ action('SingupController@store') }}" class="row">

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

    {{--<span class="text-black">Расписание на {{ $date }}</span>--}}

<table class="table table-striped">
    <thead class="text-black thead-dark">
    <tr>
        {{--<th scope="col">Дата</th>--}}
        <th scope="col">Время</th>
        <th scope="col">Тренер</th>
        <th scope="col">Секция</th>
        <th scope="col">№ зала</th>

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
                ?>
        <tr>
            {{--<td>{{ date_format(date_create($shedule->date_training), 'd-m-Y') }}</td>--}}
            <td>{{ date_format(date_create($shedule->start_training), 'H:i') }} - {{ date_format(date_create($shedule->stop_training), 'H:i') }}</td>
            <td>{{ $shedule->trainer_name }}</td>
            <td>{{ $section }}</td>
            <td>{{ $shedule->gym_number }}</td>

            @can("manipulate", "App\SheduleUser")
                <td>
                    <label for="check_shedule_id">
                        <input id="check_shedule_id" type="checkbox" name="check_shedule_id[]" value="{{ $shedule->shedule_id }}">{{ $shedule->shedule_id }}
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
                <input type="submit" class="btn btn-primary rounded text-white px-4" value="Записаться">
            </div>
       @endif
        </form>
        {{--@section('success')--}}
        {{--@include('singup.success_singup_list')--}}
    @endcan


@endif
@endif
