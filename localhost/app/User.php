<?php

namespace App;
use App\Notifications\InfoNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Mail\Users\UserPasswordResetEmail;
use App\Mail\Users\UserVerificationEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContracts;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmail;

class User extends Authenticatable  implements MustVerifyEmailContracts
{
    use Notifiable;

    protected $table = 'users';//вторая связываемая таблица
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'personalinfo_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //m-1 (ед)
    //---------------------------------------

    public function personalinfo(){
        return $this->belongsTo("App\Personalinfo", "personalinfo_id", "id");
    }

    public function role(){
        return $this->belongsTo("App\Role", "role_id", "id");
    }

    //---------------------------------------

    public function isAdmin()
    {
        if($this->role_id !== null) {
            //не role()!!!
            return $this->role->title === 'admin';
        }
    }

    public function isGuest()
    {
        if($this->role_id !== null){
            return $this->role->title === 'guest';
        }
    }
    public function isTrainer()
    {
        if($this->role_id !== null) {
            return $this->role->title === 'trainer';
        }
    }
    public function isSupport()
    {
        if($this->role_id !== null) {
            return $this->role->title === 'support';
        }
    }
    public function isContent()
    {
        if($this->role_id !== null) {
            return $this->role->title === 'content';
        }
    }





    //m-m (мн)-
    //--------------------------------------------

//    public function binaryfiles()
//    {
//        return $this->belongsToMany("App\Binaryfile");
//
//   //это вторая связываемая таблица, поэтому связующую таблицу не указываем при создании связи
//    }
//
//    public function contents()
//    {
//        return $this->belongsToMany("App\Content");
//        //это вторая связываемая таблица
//    }

//    public function cards()
//    {
//        return $this->belongsToMany("App\Card");
//   //это вторая связываемая таблица
//    }


//    public function shedules(){
//        return $this->belongsToMany("App\Shedule");
//        //это вторая связываемая таблица
//    }


    public function sendPasswordResetNotification($token){

        $email = $this->email;

        $email_admin = 'm-a-grigoreva@yandex.ru';
        $email_arr = [
            $email,
            $email_admin
        ];
        foreach ($email_arr as $email){
            try{
                Mail::to($email)->queue(new UserPasswordResetEmail($email, $token));//send
            }  catch(Swift_TransportException $e)
            {
                redirect()->back();//->with(['message'=>'нет подключения к интернету']);
            }
        }
    }


//    public function sendEmailVerificationNotification(){
//        $email = $this->email;
//       // $u = $this->verificationUrl($notifiable);
//
//        $email_admin = 'm-a-grigoreva@yandex.ru';
//        $email_arr = [
//            $email,
//            $email_admin
//        ];
//        foreach ($email_arr as $email){
//            try{
//                Mail::to($email)->queue(new UserVerificationEmail($email));//send
//            }  catch(Swift_TransportException $e)
//            {
//                redirect()->back();//->with(['message'=>'нет подключения к интернету']);
//            }
//        }
//    }

    public function sendEmailVerificationNotification(){

        $this->notify(new InfoNotification());
    }
}
