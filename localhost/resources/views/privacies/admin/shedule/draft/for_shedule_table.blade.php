<?php
$select_trainer_name = '';
$section = '';

?>



<div id="shedule" class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">Расписание занятий</h2>
                        </div>
        </div>

        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', function () {
                $('#period,#programs,#trainers').change( function (e) {
                    e.preventDefault();
                    $.ajax({
                        data: $("#form").serialize(),
                        type: 'POST',
                        url: "{{ action('privacies\admin\ShedulesAdminController@show') }}",
                        {{--//url: "{{ action('shedule\SheduleController@store') }}",--}}
                        success: function (data) {
                          //  console.log(data);
                            $('#btn_show').click();
                        }, error: function (msg) {
                       //     console.log(msg);
                        }
                    });
                });
            });
        </script>
        {{------------------------------------------------------------}}

        <div class="row">
            <form method='POST' id="form" action="{{ action('privacies\admin\ShedulesAdminController@show') }}" class="row">
                {{--<input name="_token" type="hidden" value="{{ csrf_token() }}">--}}
                {{ csrf_field() }}

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select"></div></div>

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select">
                        <label class="mr-sm-2" for="period">Показать расписание на период:</label><br/>
                        <select id="period" name="period" class="form-control">
                            {{--<option  value="" hidden></option>--}}
                            <option value="today"  @if($period_select === "today")  selected @endif>Сегодня</option>
                            <option value="week" @if($period_select === "week")  selected @endif >На неделю</option>
                            <option value="month" @if($period_select === "month")  selected @endif>На месяц</option>

                            {{--<option value="week" @if($program_select === "week")  selected @endif>На неделю</option>--}}
                            {{--<option value="week" {{ old('period') === "week" ? 'selected' : '' }}>На неделю</option>--}}
                            {{--<option value="day">Точная дата</option>--}}

                        </select>
                    </div>
                </div>

                {{--<div class="col-md-auto toolbar-form bg-white  mb-3">--}}
                    {{--<div class="tolbar-select">--}}
                        {{--<label class="mr-sm-2" for="programs">Выберете программу:</label><br/>--}}
                        {{--<select id="programs" name="programs" class="form-control">--}}
                            {{--<option value="" @if($program_select === "")  selected @endif>Все программы</option>--}}
                            {{--<option value="morning_programs" @if($program_select === "morning_programs")  selected @endif>Утренние программы</option>--}}
                            {{--<option value="body_building" @if($program_select === "body_building")  selected @endif>Боди билдинг</option>--}}
                            {{--<option value="stretching" @if($program_select === "stretching")  selected @endif>Стретчинг</option>--}}
                            {{--<option value="fitness" @if($program_select === "fitness")  selected @endif>Фитнес</option>--}}
                            {{--<option value="yoga" @if($program_select === "yoga")  selected @endif>Йога</option>--}}
                            {{--<option value="child_programs" @if($program_select === "child_programs")  selected @endif>Детсткие программы</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--@if($program_select !== "")--}}
                <?php
//                switch ($program_select){
//                    case "morning_programs":
//                        $section = "Утренние программы";
//                        break;
//                    case "body_building":
//                        $section = "Боди билдинг";
//                        break;
//                    case "stretching":
//                        $section = "Стретчинг";
//                        break;
//                    case "fitness":
//                        $section = "Фитнес";
//                        break;
//                    case "yoga":
//                        $section = "Йога";
//                        break;
//                    case "child_programs":
//                        $section = "Детсткие программы";
//                        break;
//                }
                ?>
                {{--@endif--}}
                {{--<div class="col-md-auto toolbar-form bg-white  mb-3">--}}
                    {{--<div class="tolbar-select">--}}
                        {{--<label class="mr-sm-2" for="trainers">Выберете тренера:</label><br/>--}}
                        {{--<select id="trainers" name="trainers" class="form-control">--}}
                            {{--<option value="" hidden></option>--}}
                            {{--<option value="" selected>Все тренеры</option>--}}
                            {{--<option value="" @if($trainers_select === "")  selected @endif>Все тренеры</option>--}}

                            {{--@if(isset($shedule_for_date) && $shedule_for_date!=='')--}}

                                <?php
                             //   $shedule_for_date_u =  $shedule_for_date->unique('trainer_id')
                                ?>

                                    {{--@foreach($shedule_for_date_u as $shedule)--}}

                                        {{--<option value="{{ $shedule->trainer_id }}"--}}
                                                {{--@if($trainers_select === "{$shedule->trainer_id }")  selected @endif>--}}
                                         {{--{{ $shedule->trainer_name }}--}}
                                        {{--</option>--}}

                                {{--<option value="{{ $shedule->trainer_id }}">--}}
                                    {{--{{      $shedule->trainer_surname--}}
                                          {{--." ". $shedule->trainer_name--}}
                                          {{--." ". $shedule->trainer_middle_name }}--}}
                                {{--</option>--}}
                                        {{--@if($trainers_select === "{$shedule->trainer_id }")--}}
                                            <?php
//                                            $select_trainer_name =   $shedule->trainer_surname
//                                                ." ". $shedule->trainer_name
//                                                ." ". $shedule->trainer_middle_name ;
                                            ?>
                                             {{--@endif>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}


                <div class="col p-4 text-md-right bg-white align-bottom">
                    <input type="submit" id="btn_show" class="btn btn-primary rounded text-white px-4" value="Показать">
            </div>
            </form>

            {{--------------status----------------------------------------------------------------------}}
            @if (session('status'))

                    <div class="col  p-4 text-center">
                        <div class="form-group text-center">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
            @endif
            {{------------------------------------------------------------}}

        </div>
        {{-----------------------------------------------------------------}}
        {{--<div class="p-4">--}}
        {{--@if($program_select !== '')--}}
        {{--<div class="row">--}}
            {{--<div class="col">--}}
                {{--<span>Секция: </span><span class="h3 orange">{{ $section }}</span>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--@if($select_trainer_name !== '')--}}
        {{--<div class="row mb-3">--}}
            {{--<div class="col">--}}
                {{--<span>Тренер: </span><span class="h3 orange">{{ $select_trainer_name }}</span>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}
    {{--</div>--}}
        {{-----------------------------------------------------------------}}


        <div class="row">
            <div class="col">
                    @include('privacies.admin.shedule.shedule_table')

            </div>
        </div>


    </div> {{-- container--}}
</div>
</div>
