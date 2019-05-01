

{{--{{ print_r($email) }}--}}

{{--@foreach($current_user_id_db as $current_user_id)--}}
{{--{{ $current_user_id }}--}}
{{--@endforeach--}}

{{--{{ print_r($current_user_id_db) }}--}}
{{--{{ print_r($current_user_email) }}--}}



<div class="py-5 bg-light">
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">Контакная информация</h3>
                    <p class="mb-0 font-weight-bold">Адрес клуба</p>
                    <p class="mb-4">г.Москва, ул. Правды, д.1</p>

                    <p class="mb-0 font-weight-bold">Телефон</p>
                    <p class="mb-4"><a class="a-link" href="{{ __('+7-(999)-876-54-32') }}">+7-(999)-876-54-32</a></p>

                    <p class="mb-0 font-weight-bold">Email-адрес</p>
                    <p class="mb-4"><a class="a-link" href="mailto:support@sport.ru">support@sport.ru</a></p>

                </div>


            </div>
            <div class="col-lg-8">
                <div class="p-4 bg-white  mb-3">
                    <h3 class="h5 text-black mb-3">Напишите нам</h3>
                    {{--<div class="col-md-12 col-lg-8 mb-5  bg-white">--}}
                    <form method='POST' action="{{ action('contacts\ContactsController@store') }}" class="mb-0 bg-white">
                        @csrf

                        <?php
                        $email = '';
                        $name = '';
                        $phone = '';

                        if(Auth::user()!== null){
                            $email = Auth::user()->email;
                            $name = Auth::user()->personalinfo()->get('name')[0]->name;
                            $phone = Auth::user()->personalinfo()->get('telephone')[0]->telephone;
                        }

                        ?>


                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="name">Ваше имя</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Имя"
                                       value="{{ old('name', $name) }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                       value="{{ old('email', $email) }}">



                                {{--value="--}}
                                {{--@if (Auth::user()!== null)--}}
                                    {{--{{ old('email', Auth::user()->email) }}--}}
                                    {{--@elseif (Auth::user()=== null)--}}
                                {{--{{ old('email') }}--}}
                                {{--@endif--}}
                               {{--">--}}


                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="phone">Телефон</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Телефон"
                                       value="{{ old('phone', $phone) }}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="message">Сообщение</label>
                                <textarea name="message" name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Сообщение..."></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Отправить" class="btn btn-primary text-white px-4 py-2">
                            </div>
                        </div>


                    </form>



                </div>
            </div>
        </div>


    </div>
</div>


{{--<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Afe6f29db80750e3157771caa6fe94945176db7d8bb70265a743b0c973feede3d&amp;source=constructor" width="100%" height="443" frameborder="0"></iframe>--}}
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afe6f29db80750e3157771caa6fe94945176db7d8bb70265a743b0c973feede3d&amp;width=100%25&amp;height=443&amp;lang=ru_RU&amp;scroll=false"></script>
