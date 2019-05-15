<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Self_;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = '/home';
    protected $redirectTo = '/login/success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //для для аутентификации будет использоваться поле имя
//    public function username()
//    {
//        return 'name';
//    }

//    protected function validateLogin(Request $request)
//    {
//        $request->validate([
//            $this->username() => 'required|string',
//            'password' => 'required|string',
//        ], [
//            $this->username().'required' => 'Введите адрес электронной почты',
//            'password.required' => 'Введите пароль'
//        ]);
//    }


    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => 'Пользователь с таким адресом электронной почты отсутствует в списке'
        ]);
    }
    public function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 50;
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @return int
     */
    public function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 1;
    }


    public function login(Request $request)
    {
        if(User::where('email', $request->email)->first() !== null) {
            if (User::where('email', $request->email)->first()->email_verified_at !== null) {
                $this->validateLogin($request);

                // If the class is using the ThrottlesLogins trait, we can automatically throttle
                // the login attempts for this application. We'll key this by the username and
                // the IP address of the client making these requests into this application.
                if ($this->hasTooManyLoginAttempts($request)) {
                    $this->fireLockoutEvent($request);

                    return $this->sendLockoutResponse($request);
                }

                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }

                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);
            } else {

                return redirect()->route('auth.verify')->with('status', 'Вы не подвердили свой email. Пожалуйста, перейдите по ссылке из нашего письма или повторите отправку.');
                //  return redirect()->back()->with('status', 'Вы не подвердили свой email. Пожалуйста, перейдите по ссылке из нашего письма или повторите отправку.');
            }

        }else{
            return $this->sendFailedLoginResponse($request);
        }





    }
}
