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
    
    Route::get('/', function() {
        return view('admin.pages.beranda');
    });
    
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



