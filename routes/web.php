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

Route::get('/', function () {
    return view('member.beranda');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/check', function() {})->middleware('auth','role');


Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    
    Route::get('/', function() {
        return view('admin.admin_home');
    });
    
});

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function() {
    
    Route::get('/', function() {
        return view('member.member_home');
    });
    
});



