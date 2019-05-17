
<?php
$select = '';

?>

<div class="site-section  block-14 bg-light nav-direction-white">
    <div class="container">
        <div class="row  mb-3">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">Обратная связь</h2>
            </div>
        </div>

        {{------------------------------------------------------------}}
        <script type="text/javascript">
            {{--window.addEventListener('DOMContentLoaded', function () {--}}
            {{--$('#role_user').change( function (e) {--}}
            {{--e.preventDefault();--}}
            {{--$.ajax({--}}
            {{--data: $("#form").serialize(),--}}
            {{--type: 'POST',--}}
            {{--url: "{{ action('privacies\admin\UsersAdminController@show') }}",--}}
            {{--success: function (data) {--}}
            {{--//  console.log(data);--}}
            {{--$('#btn_show').click();--}}
            {{--}, error: function (msg) {--}}
            {{--//     console.log(msg);--}}
            {{--}--}}
            {{--});--}}
            {{--});--}}
            {{--});--}}
        </script>
        {{------------------------------------------------------------}}

        <div class="row  bg-white p-4">
            <form method='POST' id="form" action="{{ action('privacies\admin\FaqAdminController@show') }}" class="row">
                {{ csrf_field() }}

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select">
                        <label class="mr-sm-2" for="email_user">Поиск истории вопросов пользователя по email: </label><br/>

                        <select id="email_user" name="email_user" class="form-control">
                            <option value="" @if(old('email_user') === "")  selected @endif></option>

                    {{--@if(isset($check_email)&& $check_email!=='')--}}
                                {{--<option value="{{ $check_email }}"--}}
                                        {{--@if(old('role_user') === "{$check_email}")--}}
                                        {{--selected--}}
                                    {{--@endif>--}}
                                    {{--{{ $check_email }}--}}
                                {{--</option>--}}
                     {{--@else--}}
                            @foreach($new_emails_unique as $question_email)
                                <option value="{{ $question_email }}"
                                        @if(old('role_user') === "{$question_email}")
                                        selected
                                    @endif>
                                    {{ $question_email }}
                                </option>
                            @endforeach
                     {{--@endif--}}
                        </select>
                    </div>
                </div>

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
        <div class="p-4">
            @if($select !== '')
                <div class="row mb-3">
                    <div class="col">
                        <span>Email пользователя: </span><span class="h3 orange">{{ $select }}</span>
                    </div>
                </div>
            @endif
        </div>
        {{-----------------------------------------------------------------}}
        {{--@if (session('request_composer'))--}}
        @include('privacies.admin.faq.faq_table')
        {{--@endif--}}

    </div> {{-- container--}}
</div>

