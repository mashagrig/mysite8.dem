<?php

$role_user_all = App\Role::all();
$role_name = '';
$role_user_select = '';
?>



<div id="shedule" class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">Пользователи сайта</h2>
            </div>
        </div>
        {{------------------------------------------------------------}}
        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', function () {
                $('#role_user').change( function (e) {
                    e.preventDefault();
                    $.ajax({
                        data: $("#form").serialize(),
                        type: 'POST',
                        {{--url: "{{ action('privacies\admin\UsersAdminController@show') }}",--}}
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
            <form method='POST' id="form" action="{{ action('privacies\admin\UsersAdminController@show') }}" class="row">
                {{ csrf_field() }}

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select">
                        <label class="mr-sm-2" for="email_user">Поиск пользователя по email: </label><br/>
                        <input type="email" name="email_user" id="email_user" class="form-control" placeholder="Email"
                               value="{{ old('email_user') }}">
                    </div>
                </div>

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select">
                        <label class="mr-sm-2" for="role_user">Поиск пользователя по роли: </label><br/>
                        <select id="role_user" name="role_user" class="form-control">
                            <option value="" @if(old('role_user') === "")  selected @endif></option>

                            @foreach($role_user_all as $role)

                                <?php

                                switch ($role->title){
                                    case "admin":
                                        $role_name = "Администратор";
                                        break;
                                    case "guest":
                                        $role_name = "Гость";
                                        break;
                                    case "trainer":
                                        $role_name = "Тренер";
                                        break;
                                    case "support":
                                        $role_name = "Техподдержка";
                                        break;
                                    case "content":
                                        $role_name = "Контент-менеджер";
                                        break;
                                }
                                ?>
                                <option value="{{ $role_name }}"
                                        @if(old('role_user') === "{$role_name}")
                                        selected
                                    {{ $role_user_select = $role_name }}
                                    @endif>
                                    {{ $role_name }}
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
            @if($role_user_select !== '')
                <div class="row mb-3">
                    <div class="col">
                        <span>Роль: </span><span class="h3 orange">{{ $role_user_select }}</span>
                    </div>
                </div>
            @endif
        </div>
        {{-----------------------------------------------------------------}}

        @include('privacies.admin.users.users_table')

    </div> {{-- container--}}
</div>
