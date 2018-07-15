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

// route untuk halaman depan
Route::get('/', function () {
    return view('umum.beranda');
})->name('beranda');

//route Talkshow
Route::get('/talkshow', function(){
    return view('umum.talkshow.talkshow');
})->name('talkshow');

//route Seminar
Route::get('/seminar', function(){
    return view('umum.seminar.seminar');
})->name('seminar');

//Route Workshop
Route::group(['prefix' => 'workshop'], function() {
    Route::get('/', function() {
        return view('umum.workshop.workshop');
    })->name('workshop');
    // ui/ux design
    Route::get('ui_ux', function() {
        return view('umum.workshop.ui_ux');        
    })->name('workshop.ui_ux');
    // data science
    Route::get('ds', function() {
        return view('umum.workshop.ds');        
    })->name('workshop.ds');
    // cyber security
    Route::get('cs', function() {
        return view('umum.workshop.cs');        
    })->name('workshop.cs');
    // web services
    Route::get('ws', function() {
        return view('umum.workshop.ws');        
    })->name('workshop.ws');
});

//route IT Competition
Route::group(['prefix' => 'itcompetition'], function() {
    Route::get('/', function() {
        return view('umum.competition.itcompetition');
    })->name('itcompetition');
    
    Route::get('adc', function() {
        return view('umum.competition.appsDev');        
    })->name('itcompetition.adc');

    Route::get('wdc', function() {
        return view('umum.competition.webDev');        
    })->name('itcompetition.wdc');

    Route::get('dpc', function() {
        return view('umum.competition.dpc');        
    })->name('itcompetition.dpc');
});

// route daftar acara
Route::get('/event/registrasi', 'Event@showRegistrasi')->name('event.registrasi');
Route::post('/event/registrasi', 'Event@registrasi');

Auth::routes();

Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationController@resend');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/check', function() {})->middleware('auth','role');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    
    Route::get('/', function() {
        return view('admin.pages.beranda');
    });

    Route::post('/competition_confirm', 'Confirm\SendConfirmController@sendCompetitionConfirm')->name('admin.competition_confirm');
    Route::post('/event_confirm', 'Confirm\SendConfirmController@sendEventConfirm')->name('admin.event_confirm');
    
});

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function() {  
    Route::get('/', 'MemberController@showKompetisi')->name('member');
    Route::get('isidata/{id}', 'MemberController@showFormIsiData');
    Route::post('/', 'MemberController@simpanData');
    Route::patch('/', 'MemberController@updateData');
    Route::get('kuncidata', 'MemberController@kunciData')->name('member.kuncidata');
    Route::get('konfirmasi', 'MemberController@showKonfirmasi')->name('member.konfirmasi');
    Route::post('konfirmasi', 'MemberController@konfirmasi');
    Route::get('upload_berkas', 'MemberController@showFormUploadBerkas')->name('member.upload_berkas');
    Route::post('upload_berkas', 'MemberController@uploadBerkas');
});

//route untuk uji coba

use App\User;
use App\Kompetisi;
use App\Events\Confirm\UserRegistrationConfirm;


Route::get('/konfirmasi_pendaftaran', 'Confirm\SendConfirmController@send')->name('member.konfirmasi_pemdaftaran');

Route::get('/setujui', 'Confirm\RegistrationConfirmController@confirm')->name('setujui');


Route::get('/daftar_kompetisi', function() {
    $user = User::find(Auth::user()->id);

    $kompetisi = new Kompetisi([
        'jenis_lomba' => 'adc', 
        'asal_sekolah' => 'Poltek Tegal', 
        'nama_ketua_tim' => 'Fredy',
        'no_ketua_tim' => '089989899989', 
        'email_ketua_tim' => 'mail@sfdfdf.com', 
        'foto_ketua_tim' => 'aye'
    ]);

    $user->kompetisi()->save($kompetisi);
});

Route::get('/update_kompetisi', function() {
    $user = User::find(1);

    $kompetisi = [
        'jenis_lomba' => 'wdc', 
        'asal_sekolah' => 'Poltek Tegal', 
        'nama_ketua_tim' => 'Fredy Nur',
    ];

    $user->kompetisi()->update($kompetisi);
});



