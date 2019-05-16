<?php

namespace App\Http\Controllers\privacies\admin;

use App\Content;
use App\Personalinfo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('privacies.admin.users.page_users');
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
        //create
        if(
            User::where('email', "{$request->user_email}")->first() === null
        ){
            // если  заполнены
            if(
                $request->user_email !== '' &&
                $request->user_role !== '' &&
                $request->user_surname !== '' &&
                $request->user_name !== '' &&
                $request->user_middle_name !== ''
            ){
                $personalinfo_id = Personalinfo::create([
                    'email' => $request->email,
                    'surname' => $request->user_surname,
                    'name' => $request->user_name,
                    'middle_name' => $request->user_middle_name
                ])->id;
//--------------------------------------------------
                $new_user = User::create([
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'password' => Hash::make($password = '11111111'),
                    'role_id' => $request->user_role,
                    'personalinfo_id' => $personalinfo_id,
                ]);
//--------------------------------------------------
                //такой пользователь отрпавлял вопрос из контактов - update
                $email = $request->user_email;
                if(
                    Content::where('status', 'like', "%".$email."%")->first() !== null
                ){
                    //--------------------------------------------------
                    Content::where('status', 'like', "%".$email."%")->each(function ($q) use($new_user,$email){
                        Content::where('status', 'like', "%".$email."%")->first()->users()->attach($new_user);
                    });
                    //--------------------------------------------------
                }

                return redirect()->back()->with('status', 'Данные добавлены');
            }
            return redirect()->back()->with('status', 'Заполнены не все поля');
        }
        return redirect()->route('privacy.admin.users')->with('status', 'Данные не добавлены. Пользователь с таким email уже есть в базе.');

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
    public function update(Request $request)
    {
        //update
        if(
            User::where('id', $request->user_id)->first() !== null
        ){
            // если  заполнены
            if(
                $request->user_email !== '' ||
                $request->user_role !== '' ||
                $request->user_surname !== '' ||
                $request->user_name !== '' ||
                $request->user_middle_name !== ''
            ){

                User::where('id', $request->user_id)
                    ->update([
                        'email' => $request->user_email,
                        'role_id' => $request->user_role,
                    ]);
              //   redirect()->back()->with('status', 'Данные user обновлены');
               $user_id = $request->user_id;
                Personalinfo:: whereHas('users', function ($q) use($user_id){
                    $q->where('users.id', $user_id);
                })
                    ->update([
                        'email' => $request->user_email,
                        'surname' => $request->user_surname,
                        'name' => $request->user_name,
                        'middle_name' => $request->user_middle_name
                    ]);
                return   redirect()->back()->with('status', $request->user_id.'Данные обновлены');
            }
            return redirect()->back()->with('status', $request->user_email.'Вы не изменили поле для обновления');

        }

        return redirect()->route('privacy.admin.users')->with('status', "Данные не обновлены.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
