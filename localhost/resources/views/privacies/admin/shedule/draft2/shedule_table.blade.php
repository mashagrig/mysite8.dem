
        <?php

        for ($i = 0; $i < $max_period; $i++) {
            $dates_period[] = date('Y-m-d', time() + 86400 * $i);
        }
        $times = App\Trainingtime::all();
        $gyms = App\Gym::all();

        $format_date = '';
        $shedule_id = '';
        $date_training = '';
        $trainingtime = '';
        $admin_programs = '';
        $admin_trainers = '';
        $admin_gyms = '';

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

                        {{--<th scope="col" class="align-middle text-center" style="width: 25%!important;">--}}
                            {{--Программа--}}
                        {{--</th>--}}
                        {{--<th scope="col" class="align-middle text-center">--}}
                            {{--Тренер</th>--}}
                        {{--<th scope="col" class="align-middle text-center" style="width: 10%!important;">--}}
                            {{--№ зала--}}
                        {{--</th>--}}
                        {{--<th scope="col" class="align-middle text-center" style="width: 15%!important;">--}}
                            {{--Сохранить--}}
                        {{--</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    {{-----------Для каждого интервала тренировки----------------------------------------}}
                    @foreach($times as $time)
                        <?php
                        $start_training = date_format(date_create($time->start_training), 'H:i');
                        $stop_training = date_format(date_create($time->stop_training), 'H:i');


                        //если есть такая запись
                        if(
                            App\Shedule::where('date_training', "{$date_period}")
                                ->where('trainingtime_id', "{$time->id}")->first() !== null
                        ) {
                            $shedule_real = App\Shedule::where('date_training', "{$date_period}")
                                ->where('trainingtime_id', "{$time->id}")->first();


                            $admin_programs_id = $shedule_real->section_id;
                            $admin_trainers = $shedule_real->user_id;
                            $admin_gyms_id = $shedule_real->gym_id;

                            $admin_programs = App\Section::where('id', 'like', "%{$admin_programs_id}%")
                                ->first()->title;

                            $admin_gyms = App\Gym::where('id', 'like', "%{$admin_gyms_id}%")
                                ->first()->number;
                        } else {
                            if (
                                App\Shedule::where('date_training', "{$date_period}")
                                    ->where('trainingtime_id', "{$time->id}")->first() === null
                            ) {
                                $admin_programs = '';
                                $admin_trainers = '';
                                $admin_gyms = '';
                            }
                        }
                        ?>
                        <form id="admin_shedule{{ $time->id }}" method='POST' action="{{ action('privacies\admin\ShedulesAdminController@store') }}"
                              class="row">
                            @csrf


                            <input type="text" id="date_training" name="date_training" value="{{ $date_period }}" hidden>
                            <input type="text" id="time_id" name="time_id" value="{{ $time->id }}" hidden>
                            {{-----------EMPTY------------------------------------------------------------}}
                            <tr>
                                <td class="align-middle text-center">{{ $start_training }}
                                    - {{ $stop_training }}</td>

                                {{-----------EMPTY-programs--------------------}}
                                <td class="align-middle text-center">
                                    <select id="admin_programs" name="admin_programs" class="form-control">
                                        <option value=""
                                                @if(old('admin_programs', $admin_programs) === "")  selected @endif></option>
                                        <option value="morning_programs"
                                                @if(old('admin_programs', $admin_programs) === "morning_programs")  selected @endif>
                                            Утренние программы
                                        </option>
                                        <option value="body_building"
                                                @if(old('admin_programs', $admin_programs) === "body_building")  selected @endif>
                                            Боди билдинг
                                        </option>
                                        <option value="stretching"
                                                @if(old('admin_programs', $admin_programs) === "stretching")  selected @endif>
                                            Стретчинг
                                        </option>
                                        <option value="fitness"
                                                @if(old('admin_programs', $admin_programs) === "fitness")  selected @endif>Фитнес
                                        </option>
                                        <option value="yoga"
                                                @if(old('admin_programs', $admin_programs) === "yoga")  selected @endif>Йога
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
                                                @if(old('admin_trainers') === "")  selected @endif></option>

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
                                {{-----------EMPTY-gym_number--------------------}}
                                <td class="align-middle text-center">
                                    <select id="admin_gyms" name="admin_gyms" class="form-control">
                                        <option value=""
                                                @if(old('admin_gyms') === "")  selected @endif></option>

                                        @foreach($gyms as $gym)
                                            <option value="{{ $gym->id }}"
                                                    @if(old('admin_gyms', $admin_gyms) === $gym->number)  selected @endif>
                                                {{ $gym->number }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                {{-----------EMPTY-check_shedule_id--------------------}}
                                <td class="align-middle text-center">
                                    <input id="btn" type="submit" class="btn btn-secondary rounded text-white px-4" value="Сохранить">

                                </td>
                            </tr>
                        </form>
                        {{-----------------------------------------------------------------------}}

                    @endforeach
                    </tbody>
                </table>
            @endforeach
