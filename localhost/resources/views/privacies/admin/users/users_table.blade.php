<?php
$users_all = App\User::all()->reverse();
$role_all = App\Role::all();

$user_id_next = '';
$user_id_next = $users_all->first()->id + 1;


$user_id = '';
$user_email = '';
$user_role = '';
$user_surname = '';
$user_name = '';
$user_middle_name = '';
?>
{{------------------------CREATE-------------------------------------------------------------------}}
{{------------------------CREATE-------------------------------------------------------------------}}
<div class="row mb-5">
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-sm table-responsive" style="
                    padding: 0 0 0 0px!important;
                    margin: 0 0 0 0px!important;
                ">
            <thead class="text-black thead-dark">
            <tr>
                <th scope="col" class="align-middle text-center" style="width: 3%!important;">id</th>
                <th scope="col" class="align-middle text-center" style="width: 25%!important;">email</th>
                <th scope="col" class="align-middle text-center">Фамилия</th>
                <th scope="col" class="align-middle text-center">Имя</th>
                <th scope="col" class="align-middle text-center">Отчество</th>
                <th scope="col" class="align-middle text-center">Пароль</th>
                <th scope="col" class="align-middle text-center" style="width: 12%!important;">Роль</th>
                <th scope="col" class="align-middle text-center" style="width: 5%!important;">Добавить</th>
            </tr>
            </thead>
            <tbody>

            <form id="admin_users_add" method='POST'
                  action="{{ action('privacies\admin\UsersAdminController@store') }}">
                @csrf
                {{-----------EMPTY-items-----------------------------------------------------------}}
                <tr>
                    <td class="align-middle text-center">{{ $user_id_next }}</td>
                    <td class="align-middle text-center"><input type="text" id="user_email" name="user_email"  class="form-control"></td>
                    {{--<td class="align-middle text-center">--}}
                    {{--<div class="text-center"><input type="text" id="user_email" name="user_email"  class="form-control">--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<small>Пароль</small>--}}
                        {{--<input type="text" id="user_password" name="user_password"  class="form-control">--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    <td class="align-middle text-center"><input type="text" id="user_surname" name="user_surname"  class="form-control"></td>
                    <td class="align-middle text-center"><input type="text" id="user_name" name="user_name"  class="form-control"></td>
                    <td class="align-middle text-center"><input type="text" id="user_middle_name" name="user_middle_name"  class="form-control"></td>
                    <td class="align-middle text-center"><input type="text" id="user_password" name="user_password"  class="form-control"></td>


                    {{-----------EMPTY-role--------------------}}
                    <td class="align-middle text-center">
                        <select id="user_role" name="user_role" class="form-control">
                            <option value="" selected hidden=""></option>
                            <option value="" @if(old('user_role') === "")  selected @endif></option>

                            @foreach($role_all as $role)
                                <?php
                                switch ($role->title) {
                                    case "admin":
                                        $role_name = "Администратор";
                                        $role_id = App\Role::where('title', 'like', "%admin%")->first()->id;
                                        break;
                                    case "guest":
                                        $role_name = "Гость";
                                        $role_id = App\Role::where('title', 'like', "%guest%")->first()->id;
                                        break;
                                    case "trainer":
                                        $role_name = "Тренер";
                                        $role_id = App\Role::where('title', 'like', "%trainer%")->first()->id;
                                        break;
                                    case "support":
                                        $role_name = "Техподдержка";
                                        $role_id = App\Role::where('title', 'like', "%support%")->first()->id;
                                        break;
                                    case "content":
                                        $role_name = "Контент-менеджер";
                                        $role_id = App\Role::where('title', 'like', "%content%")->first()->id;
                                        break;
                                }
                                ?>
                                <option value="{{ $role_id }}"
                                        @if(old('user_role') === "{$role_id}")
                                        selected
                                    @endif>
                                    {{ $role_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    {{-----------EMPTY-btn--------------------}}
                    <td class="align-middle text-center">
                        <input id="btn" type="submit" class="btn btn-secondary rounded text-white"
                               value="Добавить">
                    </td>
                </tr>
            </form>
            {{-----------------------------------------------------------------------}}
            </tbody>
        </table>
    </div>
</div>
{{------------------------UPDATE-------------------------------------------------------------------}}
{{------------------------UPDATE-------------------------------------------------------------------}}

<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-sm table-responsive">
            <thead class="text-black thead-dark">
            <tr>
                <th scope="col" class="align-middle text-center" style="width: 3%!important;">id</th>
                <th scope="col" class="align-middle text-center" style="width: 25%!important;">email</th>
                <th scope="col" class="align-middle text-center">Фамилия</th>
                <th scope="col" class="align-middle text-center" style="width: 12%!important;">Имя</th>
                <th scope="col" class="align-middle text-center">Отчество</th>
                <th scope="col" class="align-middle text-center" style="width: 20%!important;">Роль</th>
                <th scope="col" class="align-middle text-center" style="width: 7%!important;">Сохранить</th>
                <th scope="col" class="align-middle text-center" style="width: 7%!important;">Удалить</th>
            </tr>
            </thead>
            <tbody>

                {{--------UPDATE---Для user ----------------------------------------}}
                @foreach($users_all as $user)
                    <?php
                    $user_id = $user->id;
                    $user_email = $user->email;
                    $user_role_id = $user->role_id;
                    if(App\Role::where('id', $user_role_id)->first() !== null){
                        $user_role_name = App\Role::where('id', $user_role_id)->first()->title;
                    }


                    if($user->personalinfo !== null){
                        $user_surname = $user->personalinfo->surname;
                        $user_name = $user->personalinfo->name;
                        $user_middle_name = $user->personalinfo->middle_name;
                    }

                    ?>

                    {{-----------UPDATE------------------------------------------------------------}}
                    <tr>
                        <form id="admin_users" method='POST' action="{{ action('privacies\admin\UsersAdminController@update') }}"
                              class="row">
                            @csrf

                        <td class="align-middle text-center">{{ $user_id }}
                            <input type="text" id="user_id" name="user_id" value="{{ $user_id }}" hidden="">
                        </td>
                        <td class="align-middle text-center">
                            <input type="text" id="user_email" name="user_email" value="{{ $user_email }}" class="form-control"></td>
                        <td class="align-middle text-center">
                            <input type="text" id="user_surname" name="user_surname" value="{{ $user_surname }}" class="form-control"></td>
                        <td class="align-middle text-center">
                            <input type="text" id="user_name" name="user_name" value="{{ $user_name }}" class="form-control"></td>
                        <td class="align-middle text-center">
                            <input type="text" id="user_middle_name" name="user_middle_name" value="{{ $user_middle_name }}" class="form-control"></td>

                        {{-----------UPDATE-role--------------------}}
                        <td class="align-middle text-center">
                            <select id="user_role" name="user_role" class="form-control">
                                    {{--<option value="" @if(old('user_role') === "")  selected @endif></option>--}}
                                @foreach($role_all as $role)
                                             <?php
                                        switch ($role->title) {
                                            case "admin":
                                                $role_name = "Администратор";
                                                $role_id = App\Role::where('title', 'like', "%admin%")->first()->id;
                                                break;
                                            case "guest":
                                                $role_name = "Гость";
                                                $role_id = App\Role::where('title', 'like', "%guest%")->first()->id;
                                                break;
                                            case "trainer":
                                                $role_name = "Тренер";
                                                $role_id = App\Role::where('title', 'like', "%trainer%")->first()->id;
                                                break;
                                            case "support":
                                                $role_name = "Техподдержка";
                                                $role_id = App\Role::where('title', 'like', "%support%")->first()->id;
                                                break;
                                            case "content":
                                                $role_name = "Контент-менеджер";
                                                $role_id = App\Role::where('title', 'like', "%content%")->first()->id;
                                                break;
                                        }
                                        ?>
                                    <option value="{{ $role_id }}"
                                            @if(old('user_role', $user_role_id) === $role_id)
                                            selected
                                        @endif>
                                        {{ $role_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>

                        {{-----------UPDATE-btn--------------------}}
                        <td class="align-middle text-center">
                            <input id="btn" type="submit" class="btn btn-secondary rounded text-white px-4"
                                   value="Сохранить">

                        </td>
                    </form>
                    {{-----------DELETE-btn--------------------}}

                    <td class="align-middle text-center">


                                <form id="admin_users_delete" action="{{ action('privacies\admin\UsersAdminController@destroy', $user_id) }}" method="POST">
                                    @csrf
                                    <input type="text" id="user_id" name="user_id" value="{{ $user_id }}" hidden="">
                                    <input id="btn" type="submit" class="btn btn-secondary rounded text-white px-4"
                                    value="Удалить">
                                </form>



                            {{--<a class="btn btn-primary rounded text-white px-4 mb-3"--}}
                            {{--href="{{ action('privacies\admin\UsersAdminController@destroy', $user_id) }}"--}}
                            {{--onclick="event.preventDefault(); document.getElementById('admin_users_delete').submit();">--}}
                            {{--{{ __('Удалить') }}</a>--}}
                        </td>
                    </tr>

                @endforeach
            {{-----------------------------------------------------------------------}}
            </tbody>
        </table>

    </div>
</div>

