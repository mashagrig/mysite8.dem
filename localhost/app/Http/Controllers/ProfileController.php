<?php

namespace App\Http\Controllers;

use App\Binaryfile;
use App\Content;
use App\Personalinfo;
use App\User;
use Http\Client\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ProfileController extends Controller
{
    use ResetsPasswords;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $token = Auth::user()->getRememberToken();

        return view('signup.profile')->with(
            ['token' => $token]);
        // $token = null
//            ->with(
//            ['token' => $token]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //сохранение фото

        $file = '';
        $email = '';
        $title = 'avatar';
        $name = '';

        $current_user_id_db = '';
        $current_user_id = '';

        if (Auth::user() !== null) {
            $current_user_id = Auth::user()->getAuthIdentifier();
            $current_user_db = User::where('id', $current_user_id)->get();
            $email = $current_user_db[0]->email;
            $name = $current_user_db[0]->name;
        }

        //----------Загружаем фото-----------------------------------
//                function getFileNameAndUpload()
//                {
//                    // Проверяем был ли выбран файл
//                    if (isset($_FILES['file'])) {
//
//                        if (0 < $_FILES['file']['error']) {
//                            if ($_FILES['file']['name'] === '') {
//                                //  $file_name = 'error';
//                                $file_name = "Файл не выбран";
//
//                            }
//                        } else {
//                            try {
//                                $tmp_name = $_FILES["file"]["tmp_name"];
//                                $file_name = basename($_FILES["file"]["name"]);
////                                if($_FILES["filename"]["size"] > 1024*100*1024)
////                                {
////                                    echo("Размер файла превышает три мегабайта");
////                                    exit;
////                                }
//                                move_uploaded_file($tmp_name, "../../public/uploads/" . $file_name);
//
//                            } catch (Exception $e) {
//                            }
//
//                        }
//                    } else {
//                        $file_name = "error-" . $_FILES['file']['error'];
//                        //$file_name = "свойство file из формы не попало в глобальную переменную _FILES";
//                    }
//
//
//                    return $file_name;
//                }
        //----------Загружаем фото-----------------------------------
        //  $file_name = getFileNameAndUpload();


        if (isset($request->file) && $request->file !== '') {

            if ($request->hasFile('file')) {
                $file = $request->file;
            }


            $b_id_arr = Binaryfile::
            whereHas('users', function ($q) use ($current_user_id) {
                $q->where('users.id', '=', "{$current_user_id}");
            })
                ->where('title', 'like', "%avatar%")
                ->pluck('id')
                ->toArray();

            //  $file_src = $file->storeAs('uploads', $file->getClientOriginalName(), 'public');

            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $image = Image::make($file)
                ->resize(200, 200)
                ->save('storage/uploads/' . $file->getClientOriginalName() . $ext);


            if (empty($b_id_arr)) {

                Binaryfile::create([
                    'title' => $title,
                    'file_src' => "storage/uploads/" . $file->getClientOriginalName(),
                    'text' => $name,
                ])->users()->attach($current_user_db);
            } else {
                $b_id = $b_id_arr[0];

                Binaryfile::where('id', $b_id)
                    ->update([
                        'title' => $title,
                        'file_src' => "storage/uploads/" . $file->getClientOriginalName(),
                        'text' => $name,
                    ]);
            }


        }

        //---------------------------------------------

        //отправить письмо техподдержке, админу и юзеру, если заполнены все поля!!!
        //отправляем уведомление (проверка на коннект в листенере)
        //--------------------------------------------------
        $email_admin = 'm-a-grigoreva@yandex.ru';
        $email_arr = [
            $email,
            $email_admin
        ];
        //сообщение в письмо перердаем напрямую отсюда через событие, а не через компоузер
        //  event(new ContactsEvent($email_arr, $message));
        //---------------------------------------------------


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    //-----------------------------------------
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword $user
     * @param  string $password
     * @return void
     */
//    protected function resetPassword($user, $password)
//    {
//        $user->password = Hash::make($password);
//
//        $user->setRememberToken(Str::random(60));
//
//        $user->save();
//
//        event(new PasswordReset($user));
//
//        $this->guard()->login($user);
//    }
    //-----------------------------------------


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // $token_db = Auth::user()->getRememberToken();
        //   reset( $request);

        if (!empty($request)) {
            if (!empty($request->email)&&!empty($request->password)) {
            $email = $request->email;
            $password = $request->password;

            User::where('email', $email)
                ->update([
                    'password' => Hash::make($password),
                ]);

//            if (User::where('email', $email)->first() !== null) {
//                //--------------------------------------------------
//                User::where('email', $email)
//                    ->update([
//                        'password' => Hash::make($password),
//                    ]);
//                //--------------------------------------------------
//            }
            return redirect()->back()
                ->with('status', "Вы успешно обновили пароль!");
        }
            return redirect()->back()->with('status', "Вы не заполнили поля для смены пароля");
        }
        return redirect()->back()->with('status', "Вы не заполнили поля для смены пароля");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surname = '';
        $name = '';
        $middle_name = '';
        $email = '';
        $phone = '';
        $birthdate = '';

        $current_user_id_db = '';
        $current_user_email = '';
        $current_user_id = '';
        $personalinfo_id = '';

        $surname = $request->surname;
        $name = $request->name;
        $middle_name = $request->middle_name;
        $email = $request->email;
        $phone = $request->phone;
        $birthdate = $request->birthdate;

        if (Auth::user() !== null) {
            $current_user_id = $id;//Auth::user()->getAuthIdentifier();
            $current_user_db = User::where('id', $current_user_id)->get();
            $personalinfo_id = $current_user_db[0]->personalinfo_id;

            if (!empty($request)) {
                if (isset($request->surname) && $request->surname !== null) {
                    Personalinfo::where('id', $personalinfo_id)
                        ->update([
                            'surname' => $surname,
                        ]);
                }
                if (isset($request->name) && $request->name !== null) {
                    User::where('id', $current_user_id)
                        ->update([
                            'name' => $name,
                        ]);
                    Personalinfo::where('id', $personalinfo_id)
                        ->update([
                            'name' => $name,
                        ]);
                }
                if (isset($request->middle_name) && $request->middle_name !== null) {
                    Personalinfo::where('id', $personalinfo_id)
                        ->update([
                            'middle_name' => $middle_name,
                        ]);
                }
                if (
                    isset($request->email)
                    && $request->email !== null
                    && User::where('email', $request->email)->first() === null
                ) {
                    User::where('id', $current_user_id)
                        ->update([
                            'email' => $email,
                        ]);
                    Personalinfo::where('id', $personalinfo_id)
                        ->update([
                            'email' => $email,
                        ]);
                }
                if (isset($request->phone) && $request->phone !== null) {
                    Personalinfo::where('id', $personalinfo_id)
                        ->update([
                            'telephone' => $phone,
                        ]);
                }

                if (isset($request->birthdate) && $request->birthdate !== null) {
                    Personalinfo::where('id', $personalinfo_id)
                        ->update([
                            'birthdate' => $birthdate
                        ]);
                }

                //---------------------------------------------

                //отправить письмо техподдержке, админу и юзеру, если заполнены все поля!!!
                //отправляем уведомление (проверка на коннект в листенере)
                //--------------------------------------------------
//        $email_admin = 'm-a-grigoreva@yandex.ru';
//        $email_arr = [
//            $email,
//            $email_admin
//        ];
                //сообщение в письмо перердаем напрямую отсюда через событие, а не через компоузер
                //  event(new ContactsEvent($email_arr, $message));
                //---------------------------------------------------


                return redirect()->back()->with('status', "Вы успешно обновили личные данные");
            }
           // return redirect()->back()->with('status', "Вы не внесли изменения в данные");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
