@extends('privacy')

@section('signup_guest_card')



    @if(isset($each_check_card_info) && $each_check_card_info!=='')

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
                            @if(isset($each_check_card_info) && !empty($each_check_card_info))

                                <h2 class="site-section-heading text-center">Вы успешно отправили заявку на получение карты нашего клуба:</h2>
                                <h2 class="site-section-heading text-center">Ваши карты:</h2>

                                    <form method='POST' action="{{ action('SignupCardController@destroy') }}" class="row">
                                        @csrf
                                        <?php $format_date = '';?>



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
                                                @foreach($each_check_card_info as $kk=>$singup)
                                                    @foreach($singup as $k=>$v)



                                                        {{--Для каждой уникальной даты из расписания выводим все записи для этой даты--}}
                                                        @if((strtotime($singup[$k]['first_date_subscription']) === strtotime($date)))

                                                            <?php
                                                            $card_types = $singup[$k]['card_title'];

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
                                                                {{--<td>{{ date_format(date_create($singup[$k]['start_training']), 'H:i') }}--}}
                                                                    {{--- {{ date_format(date_create($singup[$k]['stop_training']), 'H:i') }}</td>--}}
                                                                <td>{{ $singup[$k]['first_date_subscription'] }}</td>
                                                                <td>{{ $singup[$k]['user_name'] }}</td>
                                                                <td>{{ $card_types }} -
                                                                    {{ $singup[$k]['card_id'] }}</td>
                                                                <td>{{ $singup[$k]['price'] }}</td>

                                                                    <td>
                                                                        <label for="check_card_id">
                                                                            <input id="check_card_id" type="checkbox"
                                                                                   name="check_card_id[]"
                                                                                   value="{{ $singup[$k]['card_id'] }}">


                                                                        </label>
                                                                    </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @endforeach


                                            @if($format_date!=='')
                                                <div class="col text-md-right  mb-3">
                                                    <input type="submit" class="btn btn-primary rounded text-white px-4" value="Отменить">
                                                </div>
                                            @endif
                                    </form>


                                <p>В ближайшее время наш менеджер свяжется с Вами для подтверждения заявки на получение Клубной карты.</p>
                            @endif
                        @endif
                        {{--------------------------------------------------}}


                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection
