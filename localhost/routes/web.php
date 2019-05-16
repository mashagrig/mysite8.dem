<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();
\Illuminate\Support\Facades\Auth::routes(['verify' => true]);
//создаст набор маршрутов


//Route::get('/', function () {
//    return view('welcome');
//});

//с такой записью (с замыканием - анонимной функцией) кэш роуов не возможен для данной версии PHP
//Route::get('/', function () {
//    return view('home');
//});
//Route::get('/home', function () {
//    return view('home');
//});
Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

//--------- privacy -----------------
//--------- signup -----------------

//не auth иначе будет конфликт
Route::group(['middleware' => 'guest'], function() {
    Route::get('/privacy', 'PrivacyController@index')->name('privacy');
});
  // Route::get('/privacy', 'PrivacyController@index')->name('privacy');


  //  Route::get('/privacy', 'SignupController@index')->name('privacy');
//Route::post('/privacy', 'SignupController@store')->middleware("can:manipulate,App\SheduleUser");
//Route::post('/privacy/{id}/update', 'SignupController@update')->middleware("can:manipulate,App\SheduleUser");
//Route::post('/privacy/destroy', 'SignupController@destroy')->middleware("can:manipulate,App\SheduleUser");

Route::group([
    'middleware' => 'auth',
    'prefix' => '/privacy',
], function() {
    Route::group([
        'prefix' => '/profile',
    ], function() {
        Route::get('/', 'ProfileController@index')->name('privacy.profile');
        Route::put('/edit', 'ProfileController@edit');
        // Route::post('/{token}', 'ProfileController@edit');
        Route::put('/{id}', 'ProfileController@update');
        Route::put('/', 'ProfileController@store');
        Route::post('/destroy', 'ProfileController@destroy');
    });
});

Route::group([
    'middleware' => 'CheckIfAdmin',
    'prefix' => '/privacy/admin',
], function() {

        Route::group([
            'prefix' => '/users',
        ], function() {
            Route::get('/', 'privacies\admin\UsersAdminController@index')->name('privacy.admin.users');
            Route::post('/', 'privacies\admin\UsersAdminController@store');
            Route::post('/show', 'privacies\admin\UsersAdminController@show');
            Route::post('/update', 'privacies\admin\UsersAdminController@update');
            Route::post('/destroy/{id}', 'privacies\admin\UsersAdminController@destroy');
        });
        Route::group([
            'prefix' => '/shedules',
        ], function() {
            Route::get('/', 'privacies\admin\ShedulesAdminController@index')->name('privacy.admin.shedules');
            Route::get('/show', 'privacies\admin\ShedulesAdminController@show');
            Route::post('/show', 'privacies\admin\ShedulesAdminController@show');
            Route::post('/', 'privacies\admin\ShedulesAdminController@store');
            Route::post('/destroy', 'privacies\admin\ShedulesAdminController@destroy');
        });
        Route::group([
            'prefix' => '/cards',
        ], function() {
            Route::get('/', 'privacies\admin\CardsAdminController@index')->name('privacy.admin.cards');
            Route::post('/', 'privacies\admin\CardsAdminController@store');
            Route::post('/destroy', 'privacies\admin\CardsAdminController@destroy');
        });
        Route::group([
            'prefix' => '/comments',
        ], function() {
            Route::get('/', 'privacies\admin\CommentsAdminController@index')->name('privacy.admin.comments');
            Route::post('/', 'privacies\admin\CommentsAdminController@store');
            Route::post('/destroy', 'privacies\admin\CommentsAdminController@destroy');
        });
        Route::group([
            'prefix' => '/faq',
        ], function() {
            Route::get('/', 'privacies\admin\FaqAdminController@index')->name('privacy.admin.faq');
            Route::post('/', 'privacies\admin\FaqAdminController@store');
            Route::post('/show', 'privacies\admin\FaqAdminController@show');
            Route::post('/destroy', 'privacies\admin\FaqAdminController@destroy');
        });
});

    Route::group([
        'middleware' => 'CheckIfGuest',
        'prefix' => '/privacy',
        ], function() {

        Route::group([
            'prefix' => '/shedules',
        ], function() {
            Route::get('/', 'SignupController@index')->name('privacy.shedules');
            Route::post('/', 'SignupController@store');
            Route::post('/destroy', 'SignupController@destroy');
        });
        Route::group([
            'prefix' => '/cards',
        ], function() {
            Route::get('/', 'SignupCardController@index')->name('privacy.cards');
            Route::post('/', 'SignupCardController@store');
            Route::post('/destroy', 'SignupCardController@destroy');
        });
        Route::group([
            'prefix' => '/comments',
        ], function() {
            Route::get('/', 'CommentsController@index')->name('privacy.comments');
            Route::post('/', 'CommentsController@store');
            Route::post('/destroy', 'CommentsController@destroy');
        });
        Route::group([
            'prefix' => '/faq',
        ], function() {
            Route::get('/', 'FaqController@index')->name('privacy.faq');
            Route::post('/', 'FaqController@store');
            Route::post('/destroy', 'FaqController@destroy');
        });
});
//
//    Route::group([
//        'middleware' => 'CheckIfTrainer',
//        'prefix' => '/privacy',
//        ], function() {
//
//        Route::group([
//            'prefix' => '/shedules',
//        ], function() {
//            Route::get('/', 'SignupController@index')->name('privacy.shedules');
//            Route::post('/', 'SignupController@store');
//            Route::post('/destroy', 'SignupController@destroy');
//        });
//
//        Route::group([
//            'prefix' => '/faq',
//        ], function() {
//            Route::get('/', 'FaqController@index')->name('privacy.faq');
//            Route::post('/', 'FaqController@store');
//            Route::post('/destroy', 'FaqController@destroy');
//        });
//});
//    Route::group([
//        'middleware' => 'CheckIfSupport',
//        'prefix' => '/privacy',
//        ], function() {
//
//
//        Route::group([
//            'prefix' => '/faq',
//        ], function() {
//            Route::get('/', 'FaqController@index')->name('privacy.faq');
//            Route::post('/', 'FaqController@store');
//            Route::post('/destroy', 'FaqController@destroy');
//        });
//});
//    Route::group([
//        'middleware' => 'CheckIfContent',
//        'prefix' => '/privacy',
//        ], function() {
//        Route::group([
//            'prefix' => '/profile',
//        ], function() {
//            Route::get('/', 'ProfileController@index')->name('privacy.profile');
//            Route::put('/edit', 'ProfileController@edit');
//           // Route::post('/{token}', 'ProfileController@edit');
//            Route::put('/{id}', 'ProfileController@update');
//            Route::put('/', 'ProfileController@store');
//            Route::post('/destroy', 'ProfileController@destroy');
//        });
//
//        Route::group([
//            'prefix' => '/comments',
//        ], function() {
//            Route::get('/', 'CommentsController@index')->name('privacy.comments');
//            Route::post('/', 'CommentsController@store');
//            Route::post('/destroy', 'CommentsController@destroy');
//        });
//
//});



//--------- menu -----------------

//--------- login -----------------
//Route::get('/login', 'HomeController@index')->name('login'); //- такой роут ставить нельзя - будет ошибка!!!
//отображение формы аутентификации
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');

Route::get('/login/success', function () {
    return view('auth.loginSuccess');
})->name('loginSuccess');

//--------- register -----------------
//Route::get('/register', 'HomeController@index')->name('register');
//страница с формой Laravel регистрации пользователей
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');


//--------- logout -----------------
//POST запрос на выход из системы (логаут)
//Route::post('logout', 'Auth\LoginController@logout');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('/logout', 'HomeController@index')->name('logout');

//--------- sendResetLinkEmail -----------------
////POST запрос для отправки email письма пользователю для сброса пароля
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//ссылка для сброса пароля (можно размещать в письме)
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');


//POST запрос для сброса старого и установки нового пароля
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//страница с формой для сброса пароля
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/password/resetSuccess', function () {
    return view('auth.resetSuccess');
});
//--------- password - verification -----------------
//\Illuminate\Support\Facades\Auth::routes(['verify' => true]);

//просто страница с формой для верификации пароля - регает ссылку с VerifContr после всех успешно выполненных методов и действий
Route::get('/password/verification', function () {
    return view('auth.verifySuccess');
})->name('verifySuccess');




// запрос для верификации - регает ссылку с RegisterContr и из шаблоне регистрации!
Route::get('verification/send', function () {
    return view('auth.verify');
})->name('auth.verify');
Route::get('/password/send', 'Auth\VerificationController@send')->name('verification.send');
//Route::get('/password/verify', 'Auth\VerificationController@verify')->name('verification.verify');


// запрос для верификации - регает ссылку с RegisterContr и из шаблоне регистрации!
//Route::get('verification/resend', function () {
//    return view('auth.verify');
//});
//Route::get('/password/send', 'Auth\VerificationController@resend')->name('verification.resend');
Route::post('/password/send', 'Auth\VerificationController@resend')->name('verification.resend');
//страница с формой для верификации пароля
//Route::get('/password/verification', 'Auth\VerificationController@show');
// запрос для верификации
//Route::get('/password/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//Route::get('/password/resend', 'Auth\VerificationController@verify');



Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//--------- refresh_captcha -----------------

Route::get('/register/refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh_captcha');




//--------- menu -----------------


//--------- about -----------------
Route::get('/about', 'about\AboutController@index')->name('about');
Route::get('/about#about', 'about\AboutController@index')->name('about');
Route::get('/about#photo_gallery', 'about\AboutController@index')->name('photo');
Route::get('/about#actions', 'about\AboutController@index')->name('actions');
Route::get('/about#partners', 'about\AboutController@index')->name('partners');
Route::get('/about#comments', 'about\AboutController@index')->name('comments');

//Route::get('/about/photo', 'about\PhotoController@index')->name('photo');
//Route::get('/about/actions', 'about\ActionsController@index')->name('actions');
//Route::get('/about/news', 'about\NewsController@index')->name('news');
//Route::get('/about/partners', 'about\PartnersController@index')->name('partners');
//Route::get('/about/comments', 'about\CommentsController@index')->name('comments');

//--------- programs -----------------
Route::get('/programs', 'programs\ProgramsController@index')->name('programs');
//Route::put('/programs/{id}', 'programs\ProgramsController@show');

Route::get('/programs#morning_programs', 'programs\ProgramsController@index')->name('morning_programs');
Route::get('/programs#body_building', 'programs\ProgramsController@index')->name('body_building');
Route::get('/programs#stretching', 'programs\ProgramsController@index')->name('stretching');
Route::get('/programs#fitness', 'programs\ProgramsController@index')->name('fitness');
Route::get('/programs#yoga', 'programs\ProgramsController@index')->name('yoga');
Route::get('/programs#pilates', 'programs\ProgramsController@index')->name('pilates');
Route::get('/programs#child_programs', 'programs\ProgramsController@index')->name('child_programs');
//--------- cards -----------------
Route::get('/cards', 'cards\CardsController@index')->name('cards');
Route::get('/cards#cards_year', 'cards\CardsController@index')->name('cards_year');
Route::get('/cards#cards_six_month', 'cards\CardsController@index')->name('cards_six_month');
Route::get('/cards#cards_three_month', 'cards\CardsController@index')->name('cards_three_month');
Route::get('/cards#cards_one_month', 'cards\CardsController@index')->name('cards_one_month');
Route::get('/cards#cards_personal', 'cards\CardsController@index')->name('cards_personal');
Route::get('/cards#cards_child', 'cards\CardsController@index')->name('cards_child');
//--------- trainers -----------------
Route::get('/trainers', 'trainers\TrainersController@index')->name('trainers');
//--------- shedule -----------------
Route::get('/shedule', 'shedule\SheduleController@index')->name('shedule');
//Route::post('/shedule', 'shedule\SheduleController@show');
Route::put('/shedule/{id}', 'shedule\SheduleController@show');
Route::post('/shedule', 'shedule\SheduleController@store');



//--------- contacts -----------------
Route::get('/contacts', 'contacts\ContactsController@index')->name('contacts');
Route::post('/contacts', 'contacts\ContactsController@store');




/*





  */
