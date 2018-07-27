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

//route timeline
Route::get('/jadwal', function(){
    return view('umum.timeline');
})->name('timeline');

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
Route::get('/event/registrasi', 'EventController@showRegistrasi')->name('event.registrasi');
Route::post('/event/registrasi', 'EventController@registrasi');

Auth::routes();

//route activate email
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationController@resend');

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

    Route::get('/post', 'AdminController@post');
    Route::post('/postStore', 'AdminController@postStore');
    Route::get('/post/{id}', 'AdminController@postEdit');
    Route::post('/postUpdate/{id}', 'AdminController@updatePost');
    Route::get('/postHapus/{id}', 'AdminController@destroyPost');


    Route::get('/sponsor', 'AdminController@sponsor');
    Route::post('/sponsorStore', 'AdminController@sponsorStore');
    Route::get('/sponsor/{id}', 'AdminController@sponsorEdit');
    Route::get('/sponsorHapus/{id}', 'AdminController@destroySponsor');
    Route::post('/sponsorUpdate/{id}', 'AdminController@updateSponsor');

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
    Route::get('/api/{id}/kompetisi', 'AdminController@apiKompetisiById');
    Route::post('/api/kompetisi/konfirmasi', 'AdminController@konfirmasiKompetisi')->name('api.kompetisi.konfirmasi');
    Route::get('/api/kompetisi/adc', 'AdminController@apiAdc')->name('api.kompetisi.adc');
    Route::get('/api/kompetisi/wdc', 'AdminController@apiWdc')->name('api.kompetisi.wdc');
    Route::get('/api/kompetisi/dc', 'AdminController@apiDc')->name('api.kompetisi.dc');

    Route::get('/api/post', 'AdminController@apiPost')->name('api.post');
    Route::get('/api/sponsor', 'AdminController@apiSponsor')->name('api.sponsor');
    Route::get('/api/hitung', 'AdminController@apiCount')->name('api.count');
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


// uji coba qrcode

Route::get('/qr-code', function () 
{
    $path = public_path('storage/qrcode/inv012765432154.png');
    return \QRCode::text('inv012765432154')->setOutfile($path)->png();    
});



