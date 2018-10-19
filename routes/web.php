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
Route::get('/', 'UmumController@showBeranda')->name('beranda');

//route Talkshow
Route::get('/talkshow', 'UmumController@showTalkshow')->name('talkshow');

//route Seminar
Route::get('/seminar', 'UmumController@showSeminar')->name('seminar');

//route timeline
Route::get('/jadwal', 'UmumController@showJadwal')->name('timeline');

//Route Workshop
Route::group(['prefix' => 'workshop'], function() {
    Route::get('/', 'UmumController@showWorkshop')->name('workshop');
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
    Route::get('/', 'UmumController@showCompetition')->name('itcompetition');

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

//route news
Route::group(['prefix' => 'news'], function() {
    Route::get('/', 'UmumController@showNews')->name('news');
    Route::get('/detail', 'UmumController@showNewsById');
    Route::get('/{offset}', 'UmumController@showNews');
});


// route daftar acara
Route::get('/event/registrasi', 'EventController@showRegistrasi')->name('event.registrasi');
Route::get('/event/kirimulang', 'EventController@kirimulang')->name('event.kirimulang');
Route::post('/event/registrasi', 'EventController@registrasi');

Auth::routes();

//route activate email
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationController@resend');

Route::get('/check', function() {})->middleware('auth','role');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {

    Route::get('/', 'AdminController@index')->name('admin');
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

    
    Route::get('/absensiTalkshow/{id}', 'AdminController@absensiTalkshow');
    Route::get('/absensiSeminar/{id}', 'AdminController@absensiSeminar');
    Route::get('/absensiWorkshop/{id}', 'AdminController@absensiWorkshop');


    Route::get('/sponsor', 'AdminController@sponsor');
    Route::post('/sponsorStore', 'AdminController@sponsorStore');
    Route::get('/sponsor/{id}', 'AdminController@sponsorEdit');
    Route::get('/sponsorHapus/{id}', 'AdminController@destroySponsor');
    Route::post('/sponsorUpdate/{id}', 'AdminController@updateSponsor');


    Route::get('/media', 'AdminController@media');
    Route::post('/mediaStore', 'AdminController@mediaStore');
    Route::get('/media/{id}', 'AdminController@mediaEdit');
    Route::get('/mediaHapus/{id}', 'AdminController@destroyMedia');
    Route::post('/mediaUpdate/{id}', 'AdminController@updateMedia');

    Route::get('/inbox/{id}', 'AdminController@edit');
    Route::post('/peserta/konfirmasi/{id}', 'AdminController@konfirmasi');
    Route::post('/peserta/workshopupdate/{id}', 'AdminController@updateWorkshop');

    Route::get('/peserta/bayar/{id}', 'AdminController@sendTiket');
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
    Route::get('/api/media', 'AdminController@apiMedia')->name('api.media');
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
    Route::get('upload_app', 'MemberController@showFormUploadApp')->name('member.upload_app');
    Route::post('upload_app', 'MemberController@uploadApp');
});

// //route uji coba qrcode
// Route::get('/qrcode',function(){
//     $path = public_path('uploads/qrcode/inv153350901977.png');
//     QRCode::text('inv153350901977.png')->setOutfile($path)->png();
//     echo 'sukse generate barcode';
// });

// //Clear Cache facade value:
// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     return '<h1>Cache facade value cleared</h1>';
// });

// //Reoptimized class loader:
// Route::get('/optimize', function() {
//     $exitCode = Artisan::call('optimize');
//     return '<h1>Reoptimized class loader</h1>';
// });

// //Route cache:
// Route::get('/route-cache', function() {
//     $exitCode = Artisan::call('route:cache');
//     return '<h1>Routes cached</h1>';
// });

// //Clear Route cache:
// Route::get('/route-clear', function() {
//     $exitCode = Artisan::call('route:clear');
//     return '<h1>Route cache cleared</h1>';
// });

// //Clear View cache:
// Route::get('/view-clear', function() {
//     $exitCode = Artisan::call('view:clear');
//     return '<h1>View cache cleared</h1>';
// });

// //Clear Config cache:
// Route::get('/config-cache', function() {
//     $exitCode = Artisan::call('config:cache');
//     return '<h1>Clear Config cleared</h1>';
// });
