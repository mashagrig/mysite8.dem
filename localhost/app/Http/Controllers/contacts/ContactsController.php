<?php

namespace App\Http\Controllers\contacts;

use App\Content;
use App\Events\Contacts\ContactsEvent;
use App\Personalinfo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.page_contacts');
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
        $name = '';
        $email = '';
        $phone = '';
        $message = '';
        $current_user_id_db = '';
        $current_user_email = '';
        $current_user_id = '';

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;

        if(
            $name !== ''
            && $email !== ''
            && $phone !== ''
            && $message !== ''
        ){

            if(Auth::user()!==null){
                $current_user_id = Auth::user()->getAuthIdentifier();
            }


            $current_user_email = User::where('email', $email)->pluck('email')->toArray();

            //есть такой пользователь в базе, просто обновляем по нему данные
            if(!empty($current_user_email)){

                $current_user_db = User::where('email', $email)->get();
                //чтобы не обновлять данные зареганного пользователя
                $message_db =
                    $name
                    .', '
                    .$email
                    .', '
                    .$phone
                    .', '
                    .$message;

                Content::create([
                    'title' => 'question_from_contacts',
                    'status' => 'moderating',
                    'text' => $message_db,
                ])->users()->attach($current_user_db);

//
//            $personalinfo_id = $current_user_db->pluck('email')->toArray()[0];
//            Personalinfo::where('id', $personalinfo_id)->update([
//                'name' => $name,
//                'email' => $email,
//                'telephone' => $phone
//            ]);
            }
            //нет такого пользователя в базе, создаем по нему данные
            else
                if(empty($current_user_email)){

                    $current_user =  User::create([
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'role_id' => 2
                    ]);

                    Personalinfo::create([
                        'name' => $name,
                        'email' => $email,
                        'telephone' => $phone
                    ])->users()->save($current_user);

                    $message_db =
                        $name
                        .', '
                        .$email
                        .', '
                        .$phone
                        .', '
                        .$message;

                    Content::create([
                        'title' => 'question_from_contacts',
                        'status' => 'moderating',
                        'text' => $message_db,
                    ])->users()->attach($current_user);
                }



            //отправить письмо техподдержке, админу и юзеру, если заполнены все поля!!!
            //отправляем уведомление (проверка на коннект в листенере)
            //--------------------------------------------------
            $email_admin = 'm-a-grigoreva@yandex.ru';
            $email_arr = [
                $email,
                $email_admin
            ];
            //сообщение в письмо перердаем напрямую отсюда через событие, а не через компоузер
            event(new ContactsEvent($email_arr, $message));
            //---------------------------------------------------

        }
        else{
            //вывести сообщение, что форма не заполнена
        }


        return redirect()->action('contacts\ContactsController@index');
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
    public function destroy($id)
    {
        //
    }
}
