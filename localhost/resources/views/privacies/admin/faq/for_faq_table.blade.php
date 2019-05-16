

<?php

//$role_user_all = App\Role::all();
$role_name = '';
$select = '';

?>



<div id="shedule" class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">Вопросы от пользователей сайта</h2>
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

        <div class="row">
            <form method='POST' id="form" action="{{ action('privacies\admin\FaqAdminController@show') }}" class="row">
                {{ csrf_field() }}

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select">
                        <label class="mr-sm-2" for="email_user">Поиск истории вопросов пользователя по email: </label><br/>

                        <select id="email_user" name="email_user" class="form-control">
                            <option value="" @if(old('email_user') === "")  selected @endif></option>

                            @foreach($question_from_contacts_all as $question)

                                {{var_dump($question)}}

                                <option value="{{ $question->users_email }}"
                                        @if(old('role_user') === "{$question->users_email}")
                                        selected
                                    {{ $select = $question->users_email }}
                                    @endif>
                                    {{ $question->users_email }}
                                </option>
                            @endforeach
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
                        <span>Роль: </span><span class="h3 orange">{{ $select }}</span>
                    </div>
                </div>
            @endif
        </div>
        {{-----------------------------------------------------------------}}

        @include('privacies.admin.faq.faq_table')

    </div> {{-- container--}}
</div>

