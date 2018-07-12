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
    return view('member.beranda');
});
Route::group(['prefix' => 'itcompetition'], function() {
    Route::get('/', function() {
        return view('member.itcompetition');
    });
    
    Route::get('adc', function() {
        return view('member.appsDev');        
    });

    Route::get('wdc', function() {
        return view('member.webDev');        
    });

    Route::get('dpc', function() {
        return view('member.dpc');        
    });
    
});



Auth::routes();

Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationController@resend');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/check', function() {})->middleware('auth','role');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    
    Route::get('/', 'AdminController@index');
    Route::get('/inbox', 'AdminController@inbox');
    Route::get('/workshop', 'AdminController@workshop');
    Route::get('/seminar', 'AdminController@seminar');
    Route::get('/talkshow', 'AdminController@talkshow');

    Route::get('/adc', 'AdminController@adc');
    Route::get('/wdc', 'AdminController@wdc');
    Route::get('/dc', 'AdminController@dc');

    Route::get('/kompetisi', 'AdminController@kompetisi');
    
    Route::get('/inbox/{id}', 'AdminController@edit');
    Route::post('/peserta/konfirmasi/{id}', 'AdminController@konfirmasi');
    Route::post('/peserta/workshopupdate/{id}', 'AdminController@updateWorkshop');
    // Route::post('/peserta/konfirmasi', 'AdminController@konfirmasi');
    // Route::resource('peserta', 'AdminController');
    Route::get('/kompetisi/{id}', 'AdminController@kompetisiedit');
    

    //datatables api
    Route::get('/api/peserta', 'AdminController@apiPeserta')->name('api.peserta');
    Route::get('/api/peserta/seminar', 'AdminController@apiSeminar')->name('api.peserta.seminar');
    Route::get('/api/peserta/workshop', 'AdminController@apiWorkshop')->name('api.peserta.workshop');
    Route::get('/api/peserta/talkshow', 'AdminController@apiTalkshow')->name('api.peserta.talkshow');


    Route::get('/api/kompetisi', 'AdminController@apiKompetisi')->name('api.kompetisi');
    Route::get('/api/kompetisi/adc', 'AdminController@apiAdc')->name('api.kompetisi.adc');
    Route::get('/api/kompetisi/wdc', 'AdminController@apiWdc')->name('api.kompetisi.wdc');
    Route::get('/api/kompetisi/dc', 'AdminController@apiDc')->name('api.kompetisi.dc');
});

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function() {
    
    Route::get('/', 'MemberController@showKompetisi')->name('member');
    Route::get('isidata/{id}', 'MemberController@showFormIsiData');
    
    
});

use App\User;
use App\Kompetisi;

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



