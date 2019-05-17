<?php

namespace App\Http\Controllers\privacies\admin;

use App\Events\Contacts\ContactsEvent;
use App\Http\ViewComposers\privacies\admin\FaqAdminQuestionsComposer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('privacies.admin.faq.page_faq');

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
        $email_admin = '';
        $message_admin = '';

        $name = '';
        $email = '';
        $phone = '';
        $message = '';
        $current_user_id_db = '';
        $current_user_email = '';
        $current_user_id = '';
        $title = 'question_from_contacts';
        $status = '';


        if(
             $request->email !== null
            && $request->message_admin !== null
            && $request->message_admin !== null
        ){
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $message = $request->message;

            $email_admin = $request->email_admin;
            $message_admin = $request->message_admin;

            $current_user_email = User::where('email', $email)->pluck('email')->toArray();

            //есть такой пользователь в базе, просто обновляем по нему данные
            if(!empty($current_user_email)){

                $current_user_db = User::where('email', $email)->get();
                //чтобы не обновлять данные зареганного пользователя

                $status_db = $email
                    .", "
                    .$phone
                    .", "
                    .$name;

                Content::create([
                    'title' => $title,
                    'status' => $status_db,
                    'text' => $message,
                ])->users()->attach($current_user_db);

//
//            $personalinfo_id = $current_user_db->pluck('email')->toArray()[0];
//            Personalinfo::where('id', $personalinfo_id)->update([
//                'name' => $name,
//                'email' => $email,
//                'telephone' => $phone
//            ]);
            }
            //нет такого пользователя в базе, создаем по нему данные ТОЛЬКО в Content!!!
            else
                if(empty($current_user_email)){

//                    $current_user =  User::create([
//                        'name' => $name,
//                        'email' => $email,
//                        'phone' => $phone,
//                        'role_id' => $role_id
//                    ]);
//
//                    Personalinfo::create([
//                        'name' => $name,
//                        'email' => $email,
//                        'telephone' => $phone
//                    ])->users()->save($current_user);

                    $status_db = $email
                        .", "
                        .$phone
                        .", "
                        .$name;

                    Content::create([
                        'title' => $title,
                        'status' => $status_db,
                        'text' => $message,
                    ]);
                }



            //отправить письмо техподдержке, админу и юзеру, если заполнены все поля!!!
            //отправляем уведомление (проверка на коннект в листенере)
            //--------------------------------------------------
            $email_admin_def = 'm-a-grigoreva@yandex.ru';
            $email_arr = [
                $email,
                $email_admin,
                $email_admin_def
            ];
            //сообщение в письмо перердаем напрямую отсюда через событие, а не через компоузер
         //   event(new ContactsAnswerEvent($email_arr, $message_admin));
            //---------------------------------------------------
            $status_message = 'Вы успешно отправили сообщение. В ближайшее время наш менеджер свяжется с Вами.';
            return redirect()->back()->with('status', $status_message);
        }
        else{
            //вывести сообщение, что форма не заполнена
            $status_message = 'Вы заполнили не все поля.';
            return redirect()->back()->with('status', $status_message);
        }


        //  return redirect()->action('contacts\ContactsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(isset($request)&& $request->email_user !== null){

            $request_composer =   new FaqAdminQuestionsComposer($request);
            return view('privacies.admin.faq.page_faq')->with('request_composer', $request_composer);
        }
        return redirect()->back()->with('status_show',false );

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
