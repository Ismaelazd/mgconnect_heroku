<?php

use App\Info;
use App\User;
use App\Validationchange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Ressources Welcome
Route::get('/','WelcomeController@index')->name('Welcome');
Route::resource('welcome', 'WelcomeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
Route::get('/403', function() {
    return view('errors.403');
})->name('403');
Route::get('/404', function() {
    return view('errors.404');
})->name('404');

Route::get('/calendrier', function() {
    $info = Info::first();
    if (!Auth::check() || Auth::user()->role_id ==1) {
        $changements = Validationchange::all();

    } else {
        $users = User::where('classe_id',Auth::user()->classe_id)->get();
        $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
    }
    return view('calendrier',compact('changements','info'));
})->name('calendrier')->middleware('connected','notMember');
 

Route::resource('event', 'EventController');
Route::resource('classe', 'ClasseController');
Route::resource('presence', 'PresenceController');
Route::post('presence/{event}', 'PresenceController@store')->name('presence.add');
Route::get('presence/download/{id}', 'PresenceController@download')->name('presence.download');
Route::get('/visiteurs','UserController@visiteur')->name('visiteurs')->middleware('admin');

// Ressource MYPROFIL

// Route::resource('myProfil', 'MyProfilController');
Route::resource('myProfil', 'MyProfilController', ['parameters' => [
    'myProfil' => 'user'
]])->middleware('connected');

// Ressources Formulaire

Route::resource('form', 'FormController');

// Ressources NEWSLETTER

Route::resource('newsletter', 'NewsletterController');
// Ressources User

Route::resource('user', 'UserController');

// Ressources Info

Route::resource('info', 'InfoController')->middleware('admin');

// Ressources About

Route::resource('about', 'AboutController')->middleware('admin');

// Ressources Testimonial

Route::resource('testimonial', 'TestimonialController');
Route::post('testimonial/{id}/store','TestimonialController@store')->name('testimonial.store');




//afficher le tableau de ce qui est dans la corbeille
Route::get('formTrashed', 'FormController@trash')->name('form.trash')->middleware('admin');

// delete et donc mettre dans la corbeille
// Route::delete('form/{form}/destroy', 'FormController@destroy')->name('form.destroy');

//pour delete definitivement
Route::delete('form/{id}/force', 'FormController@forceDestroy')->name('form.forceDestroy')->middleware('admin');

// pour restaurer 
Route::put('form/{id}/restore', 'FormController@restore')->name('form.restore')->middleware('admin');



Route::resource('validationchange', 'ValidationchangeController')->middleware('coach');
Route::post('validationchange/{user}/store','ValidationchangeController@store')->name('validationchange.store')->middleware('connected');

//messagerie
Route::post('messagerie/{id}/store','MessagerieController@store')->name('messagerie.store')->middleware('notMember');;


// Ressources Slide

Route::resource('slide', 'SlideController')->middleware('admin');
Route::get('pdf/{classe}','ClasseController@pdf')->name('pdf.gen')->middleware('coach');



Route::get('presence/longueabsence/create', 'PresenceController@longueabsenceblade')->name('presence.longueabsenceblade');
Route::post('presence/longueabsence/store', 'PresenceController@longueabsence')->name('presence.longueabsence');

Route::get('/user/bigcoach/{user}', 'UserController@bigCoach')->name('bigcoach')->middleware('admin');
