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


                                <h2 class="site-section-heading text-center">Ваши карты:</h2>
                                <p class="orange">Вы успешно отправили заявку на получение карты нашего клуба</p>

                                {{--{{ var_dump($message) }}--}}
                                {{--@if(isset($message) && ($message !==''))--}}
                                {{--<p class="orange">{{ $message }}</p>--}}
                                {{--@endif--}}

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
                                                class="text-black">Заявка на карту  &bullet; <strong>{{ $format_date }}</strong></span>



                                            <table class="table table-striped">
                                                <thead class="text-black thead-dark">
                                                <tr>
                                                    <th scope="col">Срок действия</th>
                                                    <th scope="col">Привелегии</th>
                                                    <th scope="col">Цена</th>
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

                                                            switch ($singup[$k]['card_title']) {
                                                                case "year":
                                                                    $card_type = "1 год";
                                                                    break;
                                                                case "6month":
                                                                    $card_type = "6 месяцев";
                                                                    break;
                                                                case "3month":
                                                                    $card_type = "3 месяца";
                                                                    break;
                                                                case "1month":
                                                                    $card_type = "1 месяц";
                                                                    break;
                                                                case "personal":
                                                                    $card_type = "Персональная карта";
                                                                    break;
                                                                case "child":
                                                                    $card_type = "Детсткая карта";
                                                                    break;
                                                            }



                                                            $month_count = $singup[$k]['card_count_month'];
                                                          //  $month_day = $singup[$k]['card_count_day'];
                                                            $date_car = new DateTime($singup[$k]['first_date_subscription']);
                                                            $date_car->modify("+{$month_count} month -1 day");
                                                          //  $date_car->modify("+{$month_day} day");
                                                            $last_date_subscription = $date_car->format('Y-m-d');
                                                            ?>

                                                            <tr>
                                                                <td>{{ $singup[$k]['first_date_subscription'] }} - {{ $last_date_subscription }}</td>
                                                                <td>{{ $card_type }}</td>
                                                                <td>{{ number_format($singup[$k]['card_price'], 0, '', ' ') }}</td>

                                                                    <td>
                                                                        <label for="check_card_id">
                                                                            <input id="check_card_id" type="checkbox"
                                                                                   name="check_card_id[]"
                                                                                   value="{{ $singup[$k]['card_id'] }}"> -
                                                                            {{ $singup[$k]['card_id'] }}


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
