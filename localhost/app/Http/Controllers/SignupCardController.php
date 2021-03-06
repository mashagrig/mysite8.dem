<?php

namespace App\Http\Controllers;

use App\Card;
use App\Events\Cards\CheckCardEvent;
use App\Events\Cards\DestroyCardEvent;
use App\Http\ViewComposers\MessageComposer;
use App\Http\ViewComposers\SignupCardComposer;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Swift_TransportException;

class SignupCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $singup_card_composer = new SignupCardComposer();
        return view('signup.success_signup_card_list')->with('status');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card_id = '';
        $email = '';

        if (isset($request->card_id)&&($request->card_id !== null)){
            $card_id = $request->card_id;
        }

        //определяем поьзоватея (в роли гостя)
        $current_user_id = Auth::user()->getAuthIdentifier();
        $user = User::find($current_user_id);
        $email = $user->email;

//все привязанные карты к кому-либо
        $cards_arr =  Card::
        whereHas('users', function ($q) use($card_id){
            $q->where('cards.id', '=', "{$card_id}");
        })
            ->pluck('id')
            ->toArray();
//все id карт привязанных к данному пользователю
        $user_card_arr =  Card::
        whereHas('users', function ($q) use($current_user_id){
            $q->where('users.id', '=', "{$current_user_id}");
        })
            ->pluck('id')
            ->toArray();

        //запись в базу запрошенных UNIQUE тренировок на пользователя
        if(!(in_array( $card_id, $cards_arr) && in_array( $card_id, $user_card_arr))){
         Card::find($card_id)
                ->users()
                ->attach($user);

               \App\CardUser::
               where('user_id',$current_user_id)
               ->where('card_id',$card_id)
                    ->update([
                        'first_date_subscription' => date('Y-m-d')
                    ]);


               //отправляем уведомление о заказе карты с проверкой в листенере-----------------------
            $email_admin = 'm-a-grigoreva@yandex.ru';
            $email_arr = [
                $email,
                $email_admin
            ];
            event(new CheckCardEvent($email_arr, $card_id));
            //----------------------------------------------------------------------

            $message = 'Вы успешно отправили заявку на получение клубной карты. В ближайшее время наш менеджер свяжется с Вами для уточнения заказа.';
//            $message_composer = new MessageComposer();
//            $message_composer->message = $message;

         //   return redirect()->back()->with('status', $message);
            return redirect()->action('SignupCardController@index')->with('status', $message);

        }
//        если такая карта уже привязана, то просто вернуться на карты
//        return redirect()->action('cards\CardsController@index');
//        return redirect()->route('cards');

//        $message = 'Данная карта уже выбрна Вами';
//        $message_composer = new MessageComposer($message);

        return redirect()->action('SignupCardController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //определяем поьзоватея (в роли гостя)
        $current_user = Auth::user()->getAuthIdentifier();
        $email = Auth::user()->email;
        $user = User::find($current_user);
        $card_id = Array();
        //для всех выбранных позиций в расписании
        if (isset($request->check_card_id) && (!empty($request->check_card_id))) {
            $check_shedule_id = $request->check_card_id;

            foreach ($check_shedule_id as $k => $id) {

                //удаление из базы запрошенных тренировок на пользователя
                Card::find($id)
                    ->users()
                    ->detach($user);

                $card_id[] = $id;
            }
            //отправляем уведомление о заказе карты с проверкой в листенере-----------------------
            $email_admin = 'm-a-grigoreva@yandex.ru';
            $email_arr = [
                $email,
                $email_admin
            ];
            event(new DestroyCardEvent($email_arr, $card_id));
            //----------------------------------------------------------------------
            $message = 'Вы успешно отменили заявку на получение клубной карты. В ближайшее время наш менеджер свяжется с Вами для уточнения отмены заказа.';
            return redirect()->action('SignupCardController@index')->with('status', $message);
        }
        $message = 'Вы не выбрали ни одной карты для отмены заказа.';
        return redirect()->action('SignupCardController@index')->with('status', $message);
    }
}
