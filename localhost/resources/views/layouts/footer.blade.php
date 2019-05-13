<footer class="site-footer">
    <div class="container">


        <div class="row">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4 text-white">О фитнес-клубе {{ config('app.name') }}</h3>
                <p>Эффективные тренировки с лучшими тренерами москвы.<br />
                    Просторные тренажерные залы, <br />
                    новейшие тренажеры и <br />
                    качественный инвентарь. <br />
                    {{--Современный подход к фитнесу.</p>--}}
                <p class="mb-4"><a href="{{ route('about') }}" class="btn btn-primary rounded text-white px-4">Подробнее</a></p>


               <h3 class="footer-heading mb-4 text-white">Мы в сетях</h3>

                    <p>
                        <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                        <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                        <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                        <a href="#" class="p-2"><span class="icon-vimeo"></span></a>
                    </p>


            </div>
            <div class="col-md-5 ml-auto">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="footer-heading mb-4 text-white">Информация</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('actions') }}">{{ __('Акции') }}</a></li>
                            <li><a href="{{ route('cards') }}">{{ __('Клубные карты') }}</a></li>
                            <li><a href="{{ route('trainers') }}">{{ __('Тренеры') }}</a></li>
                            <li><a href="{{ route('shedule') }}">{{ __('Расписание') }}</a></li>
                            <li><a href="{{ route('contacts') }}">{{ __('Контакты') }}</a></li>
                            <li><a href="{{ route('login') }}">{{ __('Личный кабинет') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3 class="footer-heading mb-4 text-white">Программы</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('morning_programs') }}">{{ __('Утренние программы') }}</a></li>
                            <li><a href="{{ route('body_building') }}">{{ __('Боди билдинг') }}</a></li>
                            <li><a href="{{ route('stretching') }}">{{ __('Стретчинг') }}</a></li>
                            <li><a href="{{ route('fitness') }}">{{ __('Фитнес') }}</a></li>
                            <li><a href="{{ route('yoga') }}">{{ __('Йога') }}</a></li>
                            <li><a href="{{ route('child_programs') }}">{{ __('Детские программы') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

                {{--<div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Мы в сетях</h3></div>--}}
                {{--<div class="col-md-12">--}}
                    {{--<p>--}}
                        {{--<a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>--}}
                        {{--<a href="#" class="p-2"><span class="icon-twitter"></span></a>--}}
                        {{--<a href="#" class="p-2"><span class="icon-instagram"></span></a>--}}
                        {{--<a href="#" class="p-2"><span class="icon-vimeo"></span></a>--}}
                    {{--</p>--}}
                {{--</div>--}}

                <h3 class="footer-heading mb-4 text-white">Контакты</h3>

                    <p class="mb-0 font-weight-bold">Адрес клуба</p>
                    <p class="mb-2"><a href="{{ route('contacts') }}">г.Москва, ул. Правды, д.1</a></p>

                    <p class="mb-0 font-weight-bold">Телефон</p>
                    <p class="mb-2">&#9742; <a class="a-link" href="tel:{{ __('+7-(999)-876-54-32') }}">+7-(999)-876-54-32</a></p>

                    <p class="mb-0 font-weight-bold">Email-адрес</p>
                    <p class="mb-0">&#9993; <a class="a-link" href="mailto:m-a-grigoreva@yandex.ru">support@sportfit.ru</a></p>

                </div>


            </div>
        </div>
        <div class="row p-4 text-center">
            <div class="col-md-12">
                <small>
                    &copy; <script>document.write(new Date().getFullYear());</script> Сайт разработан <i class="icon-heart text-danger" aria-hidden="true"></i>  <a href="mailto:m-a-grigoreva@yandex.ru">Григорьевой Марией</a> на Laravel5
                </small>
            </div>
        </div>
    </div>
</footer>



{{--<!------------------- Scripts --------------------->----------}}
<script src="{{ asset('js/app.js') }}" type="application/javascript"></script>

<script src="{{ asset('js/libs/jquery.min.js') }}"></script>

<script src="{{ asset('js/libs/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-ui.min.js') }}"></script>

<script src="{{ asset('js/libs/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery.stellar.js') }}"></script>
<script src="{{ asset('js/libs/jquery.countdown.js') }}"></script>
<script src="{{ asset('js/libs/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('js/libs/aos.js') }}"></script>

<!------------------- -->
{{--<!--<script src="{{ asset('js/libs/purify.js') }}"></script>-->--}}
{{--<!--<script src="{{ asset('js/libs/popper.min.js') }}"></script>-->--}}
<!------------------- -->

<script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/libs/scrollup.js') }}"></script>
{{--<script src="{{ asset('js/libs/jquery.jscroll.min.js') }}"></script>--}}

{{--<script src="{{ asset('js/plugins.js') }}"></script>--}}
<script src="{{ asset('js/libs/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/draft/main.js') }}"></script>
