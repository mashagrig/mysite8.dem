
@extends('privacy')
@section('signup_card')



    @if(isset($each_check_card_info) && $each_check_card_info!=='')

        <div class="site-section  block-14 bg-light nav-direction-white">
            <div class="container">
                <div class="row  mb-3">
                    <div class="col-md-12">
                        <h2 class="site-section-heading text-center">Мои клубные карты</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        {{--------------status-------------------------------------------------------------------------------------}}
                        @if (session('status'))
                            <div class="row  text-center">
                                <div class="col-md-12  text-center">
                                    <div class="form-group row  text-center">
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    </div>

                                </div></div>
                        @endif
                        {{------------------------------------------------------------}}

                        @if(isset($max_date_select) && !empty($max_date_select))
                            @if(isset($each_check_card_info) && !empty($each_check_card_info))

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



                                            {{--<table class="table table-striped">--}}
                                            <table class="table table-hover table-striped">
                                                <thead class="text-black thead-dark">
                                                <tr>
                                                    <th scope="col">Срок действия</th>
                                                    <th scope="col">Привелегии</th>
                                                    <th scope="col">Цена</th>
                                                    @can("manipulate", "App\SheduleUser")
                                                        <th scope="col">Статус</th>
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

                                                            $status = $singup[$k]['status'];
                                                            $status_color = '';
                                                            $status_tr_style = '';
                                                            $status_check_style = '';
                                                            switch ($singup[$k]['status']) {
                                                                case "active":
                                                                    $status = "Активна";
                                                                    $status_tr_style = 'table-warning-new';
                                                                    break;
                                                                case "inactive":
                                                                    $status = "Не активна";
                                                                    $status_tr_style = 'table-secondary-new';
                                                                    $status_check_style = 'd-none';
                                                                    break;
                                                                case "cancelled":
                                                                    $status = "Заявка на карту отменена";
                                                                    $status_tr_style = 'table-secondary-new';
                                                                    $status_check_style = 'd-none';
                                                                    break;
                                                                case "expired":
                                                                    $status = "Истек срок действия";
                                                                    $status_tr_style = 'table-secondary-new';
                                                                    $status_check_style = 'd-none';
                                                                    break;
                                                                case "awaiting":
                                                                    $status = "Ожидает подтверджения";
                                                                    $status_color = "#fd7e14";
                                                                    $status_tr_style = 'table-light-new';
                                                                    break;
                                                            }



                                                            $month_count = $singup[$k]['card_count_month'];
                                                          //  $month_day = $singup[$k]['card_count_day'];
                                                           $date_carrent = new DateTime($singup[$k]['first_date_subscription']);
                                                           $last = $date_carrent->modify("+{$month_count} month -1 day");
                                                          //  $date_car->modify("+{$month_day} day");
                                                            $first_date_subscription = date_format(date_create($singup[$k]['first_date_subscription']), 'd-m-Y');
                                                            $last_date_subscription = $last->format('d-m-Y');
                                                            ?>

                                                            <tr class="{{ $status_tr_style }}">
                                                                <td>{{ $first_date_subscription }} - {{ $last_date_subscription }}</td>
                                                                <td>{{ $card_type }}</td>
                                                                <td>{{ number_format($singup[$k]['card_price'], 0, '', ' ') }}</td>
                                                                @can("manipulate", "App\SheduleUser")
                                                                    <td style="color: {{$status_color}}!important;">{{ $status }}</td>
                                                                    <td>
                                                                        <label for="check_card_id">
                                                                            <input id="check_card_id" type="checkbox"
                                                                                   name="check_card_id[]"
                                                                                   value="{{ $singup[$k]['card_id'] }}"
                                                                                   class="{{ $status_check_style }}">
                                                                            {{--{{ $singup[$k]['card_id'] }}--}}


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

                                            @if($format_date!=='')
                                                <div class="col text-md-right  mb-3">
                                                    <input type="submit" class="btn btn-primary rounded text-white px-4" value="Отменить">
                                                </div>
                                            @endif
                                    </form>

                            @endif
                        @endif
                        {{--------------------------------------------------}}


                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection
