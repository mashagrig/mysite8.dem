<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/login';
   // protected $redirectTo = '/password/verification';
  //  protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest');
        //$this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
   public function send(Request $request)
    {
//        if ($request->user()->hasVerifiedEmail()) {
//            return redirect($this->redirectPath());
//        }

       $request->user()->sendEmailVerificationNotification();

        // return back()->with('sent', true);
        back()->with('sent', true);
        return $this->show($request);

    }


    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();

        //return back()->with('resent', true);
        //return redirect($this->redirectPath())->with('resent', true);

        redirect('/password/resend')->with('resent', true);
        return $this->show($request);
    }



    public function verify(Request $request)
    {
        if (Auth::user()!== null) {

            if ($request->route('id') != $request->user()->getKey()) {
                throw new AuthorizationException;
            }

            if ($request->user()->hasVerifiedEmail()) {
                return redirect($this->redirectPath());
            }

            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }
        }else{
            if(User::where('id', $request->route('id'))->first() !== null){
                $user = User::where('id', $request->route('id'))->first();

                if ($user->hasVerifiedEmail()) {
                    return redirect($this->redirectPath());
                }

                if ($user->markEmailAsVerified()) {
                    event(new Verified($request->user()));
                }

//            $request->email = User::where('id', $request->route('id'))->first()->email;
//            $request->password = 11111111;
//
//            try {
//                (new LoginController())->login($request);
//
//            } catch (ValidationException $e) {
//            }


            }
        }

        return redirect($this->redirectPath())->with('verified', true);
    }
}
