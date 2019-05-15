@if(isset($shedule_for_date) && $shedule_for_date!=='')
    @if(isset($max_date_select) && $max_date_select!=='')

        <?php

        $times = App\Trainingtime::all();

        $format_date = '';

        $section = '';
        $message = '';
        $start_training = '';
        $stop_training = '';
        $trainer_name = '';
        $gym_number = '';
        $shedule_id = '';

        ?>


        <form method='POST' action="{{ action('SignupController@store') }}" class="row">
            @csrf

            {{-----------Для каждой уникальной даты----------------------------------------}}
            @foreach($max_date_select as $k =>$date)

                <?php
                //  $format_date =  date_format(date_create($date), 'd-m-Y');
                setlocale(LC_TIME, 'ru_RU.utf8');
                $format_date = strftime("%a %e %B %G", strtotime($date));
                ?>

                <span class="text-black">Расписание на  &bullet; <strong>{{ $format_date }}</strong></span>

                {{--<table class="table table-striped">--}}
                <table class="table table-hover table-bordered table-sm">
                    <thead class="text-black thead-dark">
                    <tr>
                        {{--<th scope="col">Дата</th>--}}
                        <th scope="col" class="align-middle text-center" style="width: 10%!important;">Время</th>
                        <th scope="col" class="align-middle text-center">Тренер</th>
                        <th scope="col" class="align-middle text-center">Секция</th>
                        <th scope="col" class="align-middle text-center" style="width: 10%!important;">№ зала</th>
                        <th scope="col" class="align-middle text-center" style="width: 10%!important;">Отметить</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-----------Для каждого интервала тренировки----------------------------------------}}
                    @foreach($times as $time)
                        <?php
                        $start_training = date_format(date_create($time->start_training), 'H:i');
                        $stop_training = date_format(date_create($time->stop_training), 'H:i');
                        ?>




                        {{-----------Для каждой заполненной строки расписания----------------------------}}
                        @foreach($shedule_for_date as $shedule)
                            {{-----------Если совпадает дата и интервал----------------------------------}}
                            @if((strtotime($shedule->date_training) === strtotime($date))
                            &&( $shedule->start_training === $time->start_training))

                                <?php
                                   $a = Array();
                                   array_push($a, $time->start_training);


                                $section = $shedule->section_title;

                                switch ($shedule->section_title) {
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

                                $trainer_name = $shedule->trainer_name;
                                $gym_number = $shedule->gym_number;
                                $shedule_id = $shedule->shedule_id;
                                ?>


                        {{-----------------------------------------------------------------------}}
                        <tr>

                            <td class="align-middle text-center">{{ $start_training }} - {{ $stop_training }}</td>
                            <td class="align-middle">{{ $trainer_name }}</td>
                            <td class="align-middle">{{ $section }}</td>
                            <td class="align-middle text-center">{{ $gym_number }}</td>
                            <td class="align-middle text-center"><label for="check_shedule_id">
                                    <input id="check_shedule_id"
                                           type="checkbox"
                                           name="check_shedule_id[]"
                                           value="{{ $shedule_id }}">
                                    {{--{{ $shedule->shedule_id }}--}}  </label>
                            </td>
                        </tr>
                        {{-----------------------------------------------------------------------}}
                        @endif
                    @endforeach

                        @if(!in_array($time->start_training, $a))
                            <?php
                            $section = '';
                            $message = '';
                            $trainer_name = '';
                            $gym_number = '';
                            $shedule_id = '';
                            ?>
                            {{-----------------------------------------------------------------------}}
                            <tr>

                                <td class="align-middle text-center">{{ $start_training }} - {{ $stop_training }}</td>
                                <td>{{ $trainer_name }}</td>
                                <td>{{ $section }}</td>
                                <td>{{ $gym_number }}</td>
                                <td class="align-middle text-center"><label for="check_shedule_id">
                                        <input id="check_shedule_id"
                                               type="checkbox"
                                               name="check_shedule_id[]"
                                               value="{{ $shedule_id }}"></label>
                                </td>
                            </tr>
                            {{-----------------------------------------------------------------------}}
                        @endif

                    @endforeach


                    </tbody>
                </table>
            @endforeach


            @if($format_date!=='')
                <div class="col text-md-right  mb-3">
                    <input id="btn" type="submit" class="btn btn-primary rounded text-white px-4" value="Сохранить">
                </div>
            @endif
        </form>



    @endif
@endif
