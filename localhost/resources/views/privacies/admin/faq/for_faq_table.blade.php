
<?php
$role_name = '';
$select = '';
$que = App\User::select(
      //  'users.id as users_id',
        'users.email as users_email'//,
//        'personalinfos.name as personalinfos_name',
//        'personalinfos.surname as personalinfos_surname',
//        'personalinfos.middle_name as personalinfos_middle_name',
//        'contents.id as contents_id',
//        'contents.title as contents_title',
//        'contents.status as status_content',//тут данные от анонимных пользователей
//        'contents.text as contents_text',
//        'contents.created_at as contents_created_at',
//        'contents.updated_at as contents_updated_at'
    )
//        ->join('personalinfos', function ($join) {
//            $join->on('personalinfos.id', '=', 'users.personalinfo_id');
//        })

        ->join('content_user', function ($join) {
            $join->on('users.id', '=', 'content_user.user_id');
        })
        ->join('contents', function ($join) {
            $join->on('contents.id', '=', 'content_user.content_id');
        })
        ->where('contents.title', 'like', '%question_from_contacts%')
        //->where('users.email', 'like', "%{$email}%")
        ->orderBy('contents.updated_at', 'desc')
        ->groupBy('contents.id')
        ->get();
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

                            {{--@foreach($question_from_contacts_all as $question)--}}
                            @foreach($que as $question)
                                <option value="{{ $question->users_email }}"
                                        @if(old('role_user') === "{$question->users_email}")
                                        selected
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
                        <span>Email пользователя: </span><span class="h3 orange">{{ $select }}</span>
                    </div>
                </div>
            @endif
        </div>
        {{-----------------------------------------------------------------}}
        {{--@if (session('request_composer')!==null)--}}
        @include('privacies.admin.faq.faq_table')
        {{--@endif--}}

    </div> {{-- container--}}
</div>

