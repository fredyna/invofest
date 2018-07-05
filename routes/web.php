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
    
    
});

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function() {
    
    Route::get('/', function() {
        return view('member.member_home');
    });
    
});



