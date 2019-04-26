<?php

namespace App\Http\Controllers;

use App\Events\Shedules\CheckSheduleEvent;
use App\Http\ViewComposers\SignupComposer;
use App\Shedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singup_composer = new SignupComposer();
                return view('signup.success_signup_list');
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
        $email = '';
            //определяем поьзоватея (в роли гостя)
        $current_user = Auth::user()->getAuthIdentifier();
        $user = User::find($current_user);
        $email = $user->email;

        //для всех выбранных позиций в расписании
        if (isset($request->check_shedule_id) && (!empty($request->check_shedule_id))) {

            $check_shedule_id = $request->check_shedule_id;

            foreach ($check_shedule_id as $k=>$id) {

                $training_arr =  Shedule::
                whereHas('users', function ($q) use($id){
                    $q->where('shedules.id', '=', "{$id}");
                })
                    ->pluck('id')
                    ->toArray();

                $user_arr =  Shedule::
                whereHas('users', function ($q) use($current_user){
                    $q->where('users.id', '=', "{$current_user}");
                })
                    ->pluck('id')
                    ->toArray();

                //запись в базу запрошенных UNIQUE тренировок на пользователя
                if(!(in_array( $id, $training_arr) && in_array( $id, $user_arr))){
                    Shedule::find($id)
                        ->users()
                        ->attach($user);

                    $email_admin = 'm-a-grigoreva@yandex.ru';
                    $email_arr = [
                        $email,
                        $email_admin
                    ];
                    event(new CheckSheduleEvent($email_arr));
                    return redirect()->action('SignupController@index');

                }
            }


        }
       // $message = 'Данная карта уже выбрна Вами';
        return redirect()->action('SignupController@index');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //определяем поьзоватея (в роли гостя)
        $current_user = Auth::user()->getAuthIdentifier();
        $user = User::find($current_user);

        //для всех выбранных позиций в расписании
        if (isset($request->check_shedule_id) && (!empty($request->check_shedule_id))) {
            $check_shedule_id = $request->check_shedule_id;

            foreach ($check_shedule_id as $k => $id) {

                //удаление из базы запрошенных тренировок на пользователя
                Shedule::find($id)
                    ->users()
                    ->detach($user);
            }}

        return redirect()->action('SignupController@index');
    }
}
