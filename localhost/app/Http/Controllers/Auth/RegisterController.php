<?php

namespace App\Http\Controllers\Auth;

use App\Binaryfile;
use App\Content;
use App\Events\Users\UserRegisteredEvent;
use App\Personalinfo;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Swift_TransportException;

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
    protected $redirectTo = 'verification/send';
 //   protected $redirectTo = '/login/success';
 //   protected $generatedPassword;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $new_user = User::where('email', $data['email'])->first();
        //если такого пользователя нет - создать
        if(
            User::where('email', $data['email'])->first() === null
        ){
            $role_id = Role::where('title', 'like', "%guest%")
                ->first()->id;
            $personalinfo_id = Personalinfo::create([
                'name' =>  $data['name'],
                'email' => $data['email'],
            ])
                ->id;
            //--------------------------------------------------
            $new_user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
              //  'password' => Hash::make($this->generatedPassword), - встроенный метод
                'role_id' => $role_id,
                'personalinfo_id' => $personalinfo_id,
            ]);
            //--------------------------------------------------
            $email = $data['email'];
            //такой пользователь отрпавлял вопрос из контактов - привязать к его новому аккаунту все обращения
            if(
                Content::where('status', 'like', "%".$email."%")->first() !== null
            ){
                //--------------------------------------------------
                Content::where('status', 'like', "%".$email."%")->each(function ($q) use($new_user,$email){
                    Content::where('status', 'like', "%".$email."%")->first()->users()->attach($new_user);
                });
                //--------------------------------------------------
            }
            return $new_user;
        }
    }
    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    //переопределяем метод из трейта
//    protected function registered(Request $request, $user)
//    {
////        $email = $user->email;
////        $email_admin = 'm-a-grigoreva@yandex.ru';
////        $email_arr = [
////            $email,
////            $email_admin
////        ];
//      //  event(new UserRegisteredEvent($email_arr, $user, $this->generatedPassword));
//
//        $this->guard()->logout();
//       // (new VerificationController())->send($request, $user);
//        return redirect()->action('Auth\VerificationController@send');
//      //  new VerificationController();
//      //  return redirect($this->redirectPath());
//    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();

        return redirect($this->redirectPath())->with('status', 'Вам на почту было отправлено письмо для верификации Вашего email.');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        try{
            event(new Registered($user = $this->create($request->all())));

        }  catch(Swift_TransportException $e)
        {
            redirect()->back();//->with(['message'=>'нет подключения к интернету']);
        }

        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function refreshCaptcha()

    {
        return response()->json(['captcha_src'=> captcha_src('flat')]);
    }
}
