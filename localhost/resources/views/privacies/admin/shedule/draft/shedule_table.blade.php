@if(isset($shedule_for_date) && $shedule_for_date!=='')
    @if(isset($max_date_select) && $max_date_select!=='')

        <?php

        $times = App\Trainingtime::all();
        $gyms = App\Gym::all();

        $format_date = '';

        //       $section = '';
        //        $message = '';
        $start_training = '';
        $stop_training = '';
        //        $trainer_name = '';
        //        $gym_number = '';
        //        $shedule_id = '';


        for ($i = 0; $i < 30; $i++) {
            $dates_period[] = date('Y-m-d', time() + 86400 * $i);
        }

        ?>




            {{-----------Для каждой уникальной даты----------------------------------------}}
            @foreach($dates_period as $date_period)
                <?php
                //  $format_date =  date_format(date_create($date), 'd-m-Y');
                setlocale(LC_TIME, 'ru_RU.utf8');
                $format_date = strftime("%a %e %B %G", strtotime($date_period));
                ?>

                @foreach($max_date_select as $k =>$date)
                    @if((strtotime($date_period) === strtotime($date)))
                        <?php
                        //  $format_date =  date_format(date_create($date), 'd-m-Y');
                        setlocale(LC_TIME, 'ru_RU.utf8');
                        $format_date = strftime("%a %e %B %G", strtotime($date));
                        ?>

                        <span class="text-black">Расписание на  &bullet; <strong>{{ $format_date }}</strong></span>

                        <table class="table table-hover table-bordered table-sm">
                            <thead class="text-black thead-dark">
                            <tr>
                                <th scope="col" class="align-middle text-center" style="width: 15%!important;">
                                    Время
                                </th>
                                <th scope="col" class="align-middle text-center" style="width: 25%!important;">
                                    Программа
                                </th>
                                <th scope="col" class="align-middle text-center">
                                    Тренер</th>
                                <th scope="col" class="align-middle text-center" style="width: 10%!important;">
                                    № зала
                                </th>
                                <th scope="col" class="align-middle text-center" style="width: 15%!important;">
                                    Сохранить
                                </th>
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
                                        ?>


                                        <form id="admin_shedule{{ $time->id }}" method='POST' action="{{ action('privacies\admin\ShedulesAdminController@store') }}"
                                              class="row">
                                            @csrf


                                        <input type="text" id="date_training" name="date_training" value="{{ $shedule->date_training }}" hidden>
                                        <input type="text" id="time_id" name="time_id" value="{{ $time->id }}" hidden>
                                        <input type="text" id="shedule_id" name="shedule_id"
                                               value="{{ $shedule->shedule_id  }}" hidden>
                                        {{---------FULL--------------------------------------------------------------}}
                                        <tr>

                                            <td class="align-middle text-center">{{ $start_training }}
                                                - {{ $stop_training }}</td>

                                            {{-----------FULL-programs--------------------}}
                                            <td class="align-middle text-center">
                                                <select id="admin_programs" name="admin_programs" class="form-control">
                                                    <option value=""
                                                            @if($shedule->section_title === "")  selected @endif></option>
                                                    <option value="morning_programs"
                                                            @if($shedule->section_title === "morning_programs")  selected @endif>
                                                        Утренние программы
                                                    </option>
                                                    <option value="body_building"
                                                            @if($shedule->section_title === "body_building")  selected @endif>
                                                        Боди билдинг
                                                    </option>
                                                    <option value="stretching"
                                                            @if($shedule->section_title === "stretching")  selected @endif>
                                                        Стретчинг
                                                    </option>
                                                    <option value="fitness"
                                                            @if($shedule->section_title === "fitness")  selected @endif>
                                                        Фитнес
                                                    </option>
                                                    <option value="yoga"
                                                            @if($shedule->section_title === "yoga")  selected @endif>
                                                        Йога
                                                    </option>
                                                    <option value="child_programs"
                                                            @if($shedule->section_title === "child_programs")  selected @endif>
                                                        Детсткие программы
                                                    </option>
                                                </select>
                                            </td>
                                            {{-----------FULL-trainer_name------------------}}
                                            <td class="align-middle text-center">
                                                <select id="admin_trainers" name="admin_trainers" class="form-control">
                                                    <option value=""
                                                            @if($shedule->trainer_name === "")  selected @endif></option>

                                                    @foreach($trainers_info as $trainers_each)
                                                        <option value="{{ $trainers_each->users_id }}"
                                                                @if($shedule->trainer_id === $trainers_each->users_id)  selected @endif>
                                                            {{ $trainers_each->personalinfos_surname
                                                            ." ". $trainers_each->personalinfos_name
                                                            ." ". $trainers_each->personalinfos_middle_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            {{----------FULL--gym_number--------------------}}
                                            <td class="align-middle text-center">
                                                <select id="admin_gyms" name="admin_gyms" class="form-control">
                                                    <option value=""
                                                            @if($shedule->gym_number === "")  selected @endif></option>

                                                    @foreach($gyms as $gym)
                                                        <option value="{{ $gym->id }}"
                                                                @if($shedule->gym_number === $gym->number)  selected @endif>
                                                            {{ $gym->number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            {{-----------FULL-check_shedule_id--------------------}}
                                            <td class="align-middle text-center">

                                                {{--<input id="btn" type="submit" class="btn btn-secondary rounded text-white px-4" value="Сохранить">--}}

                                                <a class="btn btn-secondary rounded text-white"
                                                   href="{{ action('privacies\admin\ShedulesAdminController@store') }}"
                                                   onclick="event.preventDefault(); document.getElementById('admin_shedule{{ $time->id }}').submit();">
                                                    {{ __('Сохранить') }}</a>


                                                {{--<label for="check_shedule_id">--}}
                                                    {{--<input id="check_shedule_id"--}}
                                                           {{--type="checkbox"--}}
                                                           {{--class="align-middle"--}}
                                                           {{--name="check_shedule_id[]"--}}
                                                           {{--value="{{ $shedule->shedule_id }}"></label>--}}
                                                {{--- {{ $shedule->shedule_id }}--}}
                                            </td>
                                        </tr>
                                        </form>
                                    @endif
                                @endforeach
                                {{---------------EMPTY--------------------------------------------------------}}
                                {{---------------EMPTY--------------------------------------------------------}}
                                @if(empty($a) || !in_array($time->start_training, $a))
                                    <?php
                                    $shedule_id = null;
                                    ?>

                                    <form id="admin_shedule{{ $time->id }}" method='POST' action="{{ action('privacies\admin\ShedulesAdminController@store') }}"
                                          class="row">
                                        @csrf


                                    <input type="text" id="date_training" name="date_training" value="{{ $date }}" hidden>
                                    <input type="text" id="time_id" name="time_id" value="{{ $time->id }}" hidden>
                                    {{-----------EMPTY------------------------------------------------------------}}
                                    <tr>
                                        <td class="align-middle text-center">{{ $start_training }}
                                            - {{ $stop_training }}</td>

                                        {{-----------EMPTY-programs--------------------}}
                                        <td class="align-middle text-center">
                                            <select id="admin_programs" name="admin_programs" class="form-control">
                                                <option value=""
                                                        @if(old('admin_programs') === "")  selected @endif></option>
                                                <option value="morning_programs"
                                                        @if(old('admin_programs') === "morning_programs")  selected @endif>
                                                    Утренние программы
                                                </option>
                                                <option value="body_building"
                                                        @if(old('admin_programs') === "body_building")  selected @endif>
                                                    Боди билдинг
                                                </option>
                                                <option value="stretching"
                                                        @if(old('admin_programs') === "stretching")  selected @endif>
                                                    Стретчинг
                                                </option>
                                                <option value="fitness"
                                                        @if(old('admin_programs') === "fitness")  selected @endif>Фитнес
                                                </option>
                                                <option value="yoga"
                                                        @if(old('admin_programs') === "yoga")  selected @endif>Йога
                                                </option>
                                                <option value="child_programs"
                                                        @if(old('admin_programs') === "child_programs")  selected @endif>
                                                    Детсткие программы
                                                </option>
                                            </select>
                                        </td>

                                        {{----------EMPTY--trainers--------------------}}
                                        <td class="align-middle text-center">
                                            <select id="admin_trainers" name="admin_trainers" class="form-control">
                                                <option value=""
                                                        @if(old('admin_trainers') === "")  selected @endif></option>

                                                @foreach($trainers_info as $trainers_each)
                                                    <option value="{{ $trainers_each->users_id }}"
                                                            @if(old('admin_trainers') === "{$trainers_each->users_id }")  selected @endif>
                                                        {{ $trainers_each->personalinfos_surname
                                                        ." ". $trainers_each->personalinfos_name
                                                        ." ". $trainers_each->personalinfos_middle_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        {{-----------EMPTY-gym_number--------------------}}
                                        <td class="align-middle text-center">
                                            <select id="admin_gyms" name="admin_gyms" class="form-control">
                                                <option value=""
                                                        @if(old('admin_gyms') === "")  selected @endif></option>

                                                @foreach($gyms as $gym)
                                                    <option value="{{ $gym->id }}"
                                                            @if(old('admin_gyms') === $gym->number)  selected @endif>
                                                        {{ $gym->number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        {{-----------EMPTY-check_shedule_id--------------------}}
                                        <td class="align-middle text-center">


                                            {{--<input id="btn" type="submit" class="btn btn-secondary rounded text-white px-4" value="Сохранить">--}}


                                            <a class="btn btn-secondary rounded text-white"
                                               href="{{ action('privacies\admin\ShedulesAdminController@store') }}"
                                               onclick="event.preventDefault(); document.getElementById('admin_shedule{{ $time->id }}').submit();">
                                                {{ __('Сохранить') }}</a>



                                            {{--<label for="check_shedule_id">--}}
                                                {{--<input id="check_shedule_id"--}}
                                                       {{--class="align-middle"--}}
                                                       {{--type="checkbox"--}}
                                                       {{--name="check_shedule_id[]"--}}
                                                       {{--value="{{ $shedule_id }}"></label>--}}
                                        </td>
                                    </tr>
                                    </form>
                                    {{-----------------------------------------------------------------------}}
                                @endif

                            @endforeach


                            </tbody>
                        </table>
                        {{--@if($format_date!=='')--}}
                            {{--<div class="col text-md-right  mb-3">--}}

                                {{--<a class="btn btn-primary rounded text-white px-4 mb-3"--}}
                                   {{--href="{{ action('privacies\admin\ShedulesAdminController@store') }}"--}}
                                   {{--onclick="event.preventDefault(); document.getElementById('admin_shedule').submit();">--}}
                                    {{--{{ __('Сохранить') }}</a>--}}

                                {{--<a class="btn btn-primary rounded text-white px-4 mb-3"--}}
                                   {{--href="{{ action('privacies\admin\ShedulesAdminController@destroy') }}"--}}
                                   {{--onclick="event.preventDefault(); document.getElementById('admin_shedule').submit();">--}}
                                    {{--{{ __('Очистить') }}</a>--}}

                                {{--<input id="btn" type="submit" class="btn btn-primary rounded text-white px-4" value="Сохранить">--}}
                                {{--<input id="btn_clear" type="submit" class="btn btn-primary rounded text-white px-4" value="Очистить">--}}
                            {{--</div>--}}

                        {{--@endif--}}

    @endif
    @endforeach
    @endforeach






@endif
@endif
