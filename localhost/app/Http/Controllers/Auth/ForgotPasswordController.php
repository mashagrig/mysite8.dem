<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = '/password/reset';
    public function __construct()
    {
       // $this->middleware('guest');
       // $this->middleware('auth');
    }


//    protected function validateEmail(Request $request)
//    {
//
////            $this->validate($request, ['email' => 'required|email'], [
////               'email.required' => 'Введите адрес электронной почты',
////               'email.email' => 'Введите корректный адрес электронной почты'
////            ]);
//        $v = Validator::make($request->all(), ['email' => 'required|email'], [
//            'email.required' => 'Введите адрес электронной почты',
//            'email.email' => 'Введите корректный адрес электронной почты'
//        ]);
//        try {
//            $v->validate();
//        } catch (ValidationException $e) {
//        }
//
//    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

//        $this->validate($request, ['email' => 'required|email'], [
//            'email.required' => 'Введите адрес электронной почты',
//            'email.email' => 'Введите корректный адрес электронной почты'
//        ]);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()
            ->with('status', "Письмо со ссылкой на страницу сброса пароля успешно отправлено на указанный Вами адрес");
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Указанный адрес электронной почты в списке отсутствует f']);
    }

}
