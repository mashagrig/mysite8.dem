<?php

for ($i = 0; $i < $max_period; $i++) {
    $dates_period[] = date('Y-m-d', time() + 86400 * $i);
}
$times = App\Trainingtime::all();
$gyms = App\Gym::all();

$format_date = '';
$date_training = '';
$admin_programs = '';
$admin_trainers = '';
//$admin_gyms = '';

$start_training = '';
$stop_training = '';
?>

{{-----------Для каждой уникальной даты----------------------------------------}}
@foreach($dates_period as $date_period)
    <?php
    //  $format_date =  date_format(date_create($date), 'd-m-Y');
    setlocale(LC_TIME, 'ru_RU.utf8');
    $format_date = strftime("%a %e %B %G", strtotime($date_period));
    ?>

    <span class="text-black">Расписание на  &bullet; <strong>{{ $format_date }}</strong></span>

    <table class="table table-hover table-bordered table-sm">
        <thead class="text-black thead-dark">
        <tr>
            <th scope="col" class="align-middle text-center" style="width: 10%!important;">
                Время
            </th>
            <th scope="col" class="align-middle text-center">
                Данные
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
            {{-----------EMPTY------------------------------------------------------------}}
            <tr>
                <td class="align-middle text-center">{{ $start_training }}
                    - {{ $stop_training }}</td>
                {{-----------EMPTY-programs--------------------}}
                <td class="align-middle text-center">


                    {{------------------------------------------------------}}
                    <table class="table  table-sm table-hover table-bordered">
                        <thead class="text-black thead-light">
                        <tr>
                            <th scope="col" class="align-middle text-center" style="width: 10%!important;">№ зала</th>
                            <th scope="col" class="align-middle text-center" style="width: 25%!important;">Программа
                            </th>
                            <th scope="col" class="align-middle text-center">Тренер</th>
                            <th scope="col" class="align-middle text-center" style="width: 10%!important;">Сохранить
                            </th>
                            <th scope="col" class="align-middle text-center" style="width: 10%!important;">Очистить</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($gyms as $gym)
                            <tr>

                                <?php
                                $arr_current = array();

                                foreach ($shedule_for_date as $shedule) {

                                    if(
                                        strtotime($date_period) === strtotime($shedule['date_training'])
                                        && $time->id === $shedule['trainingtime_id']
                                        && $gym->id === $shedule['gym_id']// сравниваем номер, а запоминаем id
                                    ){
                                        array_push($arr_current, $shedule);
//
                                        var_dump($arr_current);
                                        echo "<br/>";
                                        break;
                                    }
                                }



                                if(!empty($arr_current)){

                                    $admin_trainers = $shedule['trainer_id'];
                                    $admin_programs = $shedule['section_title'];

                                    var_dump($admin_trainers);
                                    echo "<br/>";
                                }else{
                                    $arr_current = null;
                                    $admin_programs = '';
                                     $admin_trainers = '';

                                    var_dump($admin_trainers);
                                    echo "<br/>";
                                }
                                var_dump($admin_trainers);
                                echo "<br/>";
                                ?>

                                {{-----------------------------------------------------------------}}
                                <form method='POST'
                                      action="{{ action('privacies\admin\ShedulesAdminController@store') }}">
                                    @csrf
                                    {{--{{ method_field("PUT") }}--}}

                                    <input type="text" id="max_period" name="max_period" value="{{ $max_period }}" hidden>
                                    <input type="text" id="date_training" name="date_training" value="{{ $date_period }}" hidden>
                                    <input type="text" id="time_id" name="time_id" value="{{ $time->id }}" hidden>
                                    <input type="text" id="admin_gyms" name="admin_gyms" value="{{ $gym->id }}" hidden>

                                    {{-----------EMPTY-gym_number--------------------}}

                                    <td class="align-middle text-center">{{ $gym->number }}</td>

                                    {{-----------EMPTY-programs--------------------}}
                                    <td class="align-middle text-center">
                                        <select id="admin_programs" name="admin_programs" class="form-control">
                                            <option value=""
                                                    @if(old('admin_programs', $admin_programs) === '')  selected @endif></option>
                                            <option value="morning_programs"
                                                    @if(old('admin_programs', $admin_programs) === "morning_programs")  selected @endif>
                                                Утренние программы
                                            </option>
                                            <option value="body_building"
                                                    @if( old('admin_programs', $admin_programs) === "body_building")  selected @endif>
                                                Боди билдинг
                                            </option>
                                            <option value="stretching"
                                                    @if(old('admin_programs', $admin_programs) === "stretching")  selected @endif>
                                                Стретчинг
                                            </option>
                                            <option value="fitness"
                                                    @if(old('admin_programs', $admin_programs) === "fitness")  selected @endif>
                                                Фитнес
                                            </option>
                                            <option value="yoga"
                                                    @if(old('admin_programs', $admin_programs) === "yoga")  selected @endif>
                                                Йога
                                            </option>
                                            <option value="child_programs"
                                                    @if(old('admin_programs', $admin_programs) === "child_programs")  selected @endif>
                                                Детсткие программы
                                            </option>
                                        </select>
                                    </td>

                                    {{----------EMPTY--trainers--------------------}}
                                    <td class="align-middle text-center">
                                        <select id="admin_trainers" name="admin_trainers" class="form-control">
                                            <option value=""
                                                    @if(old('admin_trainers', $admin_trainers) === "")  selected @endif></option>

                                            @foreach($trainers_info as $trainers_each)
                                                <option value="{{ $trainers_each->users_id }}"
                                                        @if(old('admin_trainers', $admin_trainers) === $trainers_each->users_id )  selected @endif>
                                                    {{ $trainers_each->personalinfos_surname
                                                    ." ". $trainers_each->personalinfos_name
                                                    ." ". $trainers_each->personalinfos_middle_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    {{-----------EMPTY-check_shedule_id--------------------}}
                                    <td class="align-middle text-center">
                                        <input id="btn" type="submit" class="btn btn-secondary rounded text-white px-4"
                                               value="Сохранить">
                                    </td>
                                </form>
                                {{-----------------------------------------------------------------------------------------------}}

                                {{-----------EMPTY-delete--------------------}}
                                <form method='POST'
                                      action="{{ action('privacies\admin\ShedulesAdminController@destroy') }}">
                                    @csrf
                                    <td class="align-middle text-center">
                                        <input type="text" id="max_period" name="max_period" value="{{ $max_period }}" hidden>
                                        <input type="text" id="date_training" name="date_training" value="{{ $date_period }}" hidden>
                                        <input type="text" id="time_id" name="time_id" value="{{ $time->id }}" hidden>
                                        <input type="text" id="admin_gyms" name="admin_gyms" value="{{ $gym->id }}" hidden>
                                        <input id="btn" type="submit" class="btn btn-secondary rounded text-white px-4" value="Очистить">
                                    </td>
                                </form>
                                {{------------------------------------------------------}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{------------------------------------------------------}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach
