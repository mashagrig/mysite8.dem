
@extends('privacy')

@section('privacy_guest')




@if(isset($each_check_shedule_info) && $each_check_shedule_info!=='')

    <div class="site-section  block-14 bg-light nav-direction-white">
        <div class="container">
            <div class="row  mb-5">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center">Добро пожаловать в Ваш личный кабинет:)</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    {{----------------будет удаление----------------------------------}}

                    @if(isset($max_date_select) && !empty($max_date_select))
                        @if(isset($each_check_shedule_info) && !empty($each_check_shedule_info))

                            <h2 class="site-section-heading text-center">Вы успешно запсаны на занятия:</h2>

                            @can("manipulate", "App\SheduleUser")
                                    <form method='POST' action="{{ action('SignupController@destroy') }}" class="row">
                                        @csrf
                                        <?php $format_date = '';?>
                             @endcan


                                        {{--Для каждой уникальной даты из расписания создаем таблицу--}}
                                        @foreach($max_date_select as $k =>$date)
                                            {{--{{ var_export($max_date_select) }}--}}
                                            <?php
                                            //  $format_date =  date_format(date_create($date), 'd-m-Y');
                                            setlocale(LC_TIME, 'ru_RU.utf8');
                                            $format_date = strftime("%a %e %B %G", strtotime($date));
                                            ?>

                                            <span
                                                class="text-black">Запись на  &bullet; <strong>{{ $format_date }}</strong></span>



                                            <table class="table table-striped">
                                                <thead class="text-black thead-dark">
                                                <tr>
                                                    <th scope="col">Время</th>
                                                    <th scope="col">Тренер</th>
                                                    <th scope="col">Секция</th>
                                                    <th scope="col">№ зала</th>
                                           @can("manipulate", "App\SheduleUser")
                                                        <th scope="col">Отменить</th>
                                            @endcan
                                                </tr>
                                                </thead>
                                                <tbody>


                                                {{--Для каждой записи (неуникальной) из расписания--}}
                                                @foreach($each_check_shedule_info as $kk=>$singup)
                                                    @foreach($singup as $k=>$v)



                                                    {{--Для каждой уникальной даты из расписания выводим все записи для этой даты--}}
                                                    @if((strtotime($singup[$k]['date_training']) === strtotime($date)))

                                                        <?php
                                                        $section = $singup[$k]['section_title'];

                                                        switch ($singup[$k]['section_title']) {
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
                                                            <td>{{ date_format(date_create($singup[$k]['start_training']), 'H:i') }}
                                                                - {{ date_format(date_create($singup[$k]['stop_training']), 'H:i') }}</td>
                                                            <td>{{ $singup[$k]['trainer_name'] }}</td>
                                                            <td>{{ $section }} -
                                                                {{ $singup[$k]['shedule_id'] }}</td>
                                                            <td>{{ $singup[$k]['gym_number'] }}</td>
                                              @can("manipulate", "App\SheduleUser")
                                                                <td>
                                                                    <label for="check_shedule_id">
                                                                        <input id="check_shedule_id" type="checkbox"
                                                                               name="check_shedule_id[]"
                                                                               value="{{ $singup[$k]['shedule_id'] }}">


                                                                    </label>
                                                                </td>
                                             @endcan
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @endforeach


                        @can("manipulate", "App\SheduleUser")
                               @if($format_date!=='')
                                  <div class="col text-md-right  mb-3">
                                         <input type="submit" class="btn btn-primary rounded text-white px-4" value="Отменить">
                                   </div>
                               @endif
                                    </form>
                            @endcan

                            <p>В ближайшее время наш менеджер свяжется с Вами для подтверждения записи.</p>
                        @endif
                    @endif
                    {{--------------------------------------------------}}


                </div>
            </div>
        </div>
    </div>

@endif

@endsection
