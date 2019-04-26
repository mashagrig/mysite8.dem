<?php $count = 1; ?>
{{--описание каждой программы--}}
@foreach($arr as $k=>$v)
    <?php

    $card_id = $arr[$k]['card_id'];
    $file = $arr[$k]['file'];
    $price = $arr[$k]['price'];
    $title = $arr[$k]['title'];
    $text = $arr[$k]['text'];
    $link = $arr[$k]['link'];
    ?>

    @if($count%2 === 0)

        <div id="{{ $link }}" class="site-section">
            <div class="container"><p><br/></p>
                <div class="row">
                    <div class="col-lg-6">
                        <p class="mb-5"><img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid"></p>
                    </div>
                    <div class="col-lg-5 ml-auto">
                        <h2 class="site-section-heading mb-3">{{ $title }}</h2>
                        <h2 class="site-section-heading mb-3 orange">{{ $price }}</h2>
                        <p class="mb-4">{{ $text }}</p>
                        {{-------------------отправка письма о заказе карты----------------}}


                        @guest()
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    @guest
                                        <p>Для отправки заявки на получении клубной карты Вам необходимо
                                            <a class="a-link" href="{{ route('register') }}">зарегистрироваться</a>
                                            или
                                            <a class="a-link" href="{{ route('login') }}">авторизоваться</a>
                                        </p>
                                    @endguest
                                </div>
                            </div>
                        @endguest


                        @can("manipulate", "App\SheduleUser")
                            <form method='POST' action="{{ action('SignupCardController@store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <label for="card_id" class="row">
                                            <input id="card_id" type="checkbox"
                                                   name="card_id"
                                                   value="{{ $card_id }}" hidden checked>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="submit" class="btn btn-outline-primary py-2 px-4" value="Заказать">
                                    </div>
                                </div>
                            </form>
                        @endcan
                        {{-------------------------------------------------------------------------}}


                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($count%2 !== 0)

        <div id="{{ $link }}" class="site-section">
            <div class="container"><p><br/></p>
                <div class="row">

                    <div class="col-lg-5 ml-auto">
                        <h2 class="site-section-heading mb-3">{{ $title }}</h2>
                        <h2 class="site-section-heading mb-3 orange">{{ $price }}</h2>
                        <p class="mb-4">{{ $text }}</p>


                        {{-------------------отправка письма о заказе карты----------------}}


                            @guest()
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        @guest
                                            <p>Для отправки заявки на получении клубной карты Вам необходимо
                                                <a class="a-link" href="{{ route('register') }}">зарегистрироваться</a>
                                                или
                                                <a class="a-link" href="{{ route('login') }}">авторизоваться</a>
                                            </p>
                                        @endguest
                                    </div>
                                </div>
                            @endguest


                        @can("manipulate", "App\SheduleUser")
                            <form method='POST' action="{{ action('SignupCardController@store') }}">
                                @csrf

                            <div class="row">
                                <div class="col">
                                    <label for="card_id" class="row">
                                        <input id="card_id" type="checkbox"
                                               name="card_id"
                                               value="{{ $card_id }}" hidden checked>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="submit" class="btn btn-outline-primary py-2 px-4" value="Заказать">
                                </div>
                            </div>
                        </form>
                        @endcan
                        {{-------------------------------------------------------------------------}}


                        {{--<p><a href="{{ action('cards\CardsController@store', ['card_id' => 1]) }}" class="btn btn-outline-primary py-2 px-4">Заказать</a></p>--}}
                    </div>
                    <div class="col-lg-6">
                        <p class="mb-5"><img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid"></p>
                    </div>

                </div>
            </div>
        </div>
    @endif

    <?php $count++; ?>

@endforeach

