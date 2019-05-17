<?php

namespace App\Http\Controllers\privacies\admin;

use App\Content;
use App\Events\Contacts\ContactsEvent;
use App\Http\ViewComposers\privacies\admin\FaqAdminQuestionsComposer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $guestion_id = '';

        $admin = Auth::user();


        $name = '';
        $email = '';
        $phone = '';
        $message = '';
        $current_user_id_db = '';
        $current_user_email = '';
        $current_user_id = '';
        $title = 'question_from_contacts';

        if(
             $request->email_admin !== null
            && $request->message_admin !== null
            && $request->guestion_id !== null
        ){
            $email_admin = $request->email_admin;
            $message_admin = $request->message_admin;
            $guestion_id = $request->guestion_id;



            if(Content::where('contents.status', 'like', "%@%")
                    ->where('contents.id', $guestion_id)
                    ->first() !== null){
                //выцепляем почту из сообщения
                $email = Content::where('contents.id', $guestion_id)
                    ->first()->status;
            }
            else if(Content::where('contents.status', 'like', "%@%")
                    ->where('contents.id', $guestion_id)
                    ->first() === null){
                //выцепляем почту из User (можно и проще, но потом)
                $email = User::select('users.email as users_email')
                        ->join('content_user', function ($join) {
                            $join->on('users.id', '=', 'content_user.user_id');
                        })
                        ->join('contents', function ($join) {
                            $join->on('contents.id', '=', 'content_user.content_id');
                        })
                        ->where('contents.id', $guestion_id)
                        ->get();
            }

            Content::create([
                'title' => 'answer',
                'status' => $guestion_id,
                'text' => $message_admin
            ])
                ->users()
                ->attach($admin);;
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
            $status_message = 'Вы успешно отправили ответ.';

            $request->email_user = $email;
            $request_composer =   new FaqAdminQuestionsComposer($request);
            return view('privacies.admin.faq.page_faq')->with('request_composer', $request_composer);
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

        if(isset($request)&& $request->email_user !== ''){

            $request_composer =   new FaqAdminQuestionsComposer($request);
            return view('privacies.admin.faq.page_faq')->with('request_composer', $request_composer);
        }
        return redirect()->back();

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
