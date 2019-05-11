<?php

namespace App\Http\Controllers\Auth;

use App\Binaryfile;
use App\Events\Users\UserRegisteredEvent;
use App\Personalinfo;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';
    protected $generatedPassword;
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
           // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
     //  $this->generatedPassword = Str::random(8);
        $this->generatedPassword ='11111111';
        $new_user = User::where('email', $data['email'])->first();

        //такого пользователя нет - create
        if(
            User::where('email', $data['email'])->first() === null
           // || User::where('email', $data['email'])->get()[]->password !== null
        ){


            $role_id = Role::where('title', 'like', "%guest%")
                ->first()->id;

            $personalinfo_id = Personalinfo::create([
                //  'surname' =>  'Фамилия',
                'name' =>  $data['name'],
                //'middle_name' =>  'Отчество',
                'email' => $data['email'],
            ])
                ->id;

//--------------------------------------------------
            $new_user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
               // 'password' => Hash::make($data['password']),
                'password' => Hash::make($this->generatedPassword),
                'role_id' => $role_id,
                'personalinfo_id' => $personalinfo_id,
            ]);
//--------------------------------------------------
        }
        //такой пользователь просто отрпавлял вопрос из контактов - update
        else if(
            User::where('email', $data['email'])->first() !== null
        ){
            if(User::where('email', $data['email'])->get('password')[0]->password === null){
                //--------------------------------------------------
                User::where('email', $data['email'])
                    ->update([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => Hash::make($this->generatedPassword),
                        //  'password' => Hash::make($data['password']),
                        // 'role_id' => $role_id,
                        // 'personalinfo_id' => $personalinfo_id,
                    ]);
                $new_user = User::where('email', $data['email'])->first();
                //--------------------------------------------------
            }


        }
        //такой пользователь есть
        else if(
            User::where('email', $data['email'])->first() !== null
            && User::where('email', $data['email'])->get('password')[0]->password !== null
        ){

          //  exit();
           $new_user = User::where('email', $data['email'])->first();
        }




        return $new_user;
    }
    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    //переопределяем метод из трейта
    protected function registered(Request $request, $user)
    {
        $email = $user->email;
        $email_admin = 'm-a-grigoreva@yandex.ru';
        $email_arr = [
            $email,
            $email_admin
        ];
        event(new UserRegisteredEvent($email_arr, $user, $this->generatedPassword));

     //   $this->guard()->logout();
        return redirect('/password/send');
      //  return redirect($this->redirectPath());
    }
    public function refreshCaptcha()

    {
        return response()->json(['captcha_src'=> captcha_src('flat')]);
    }
}
