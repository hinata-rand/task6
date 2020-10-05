<?php

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

Route::get('/', function () {
    return redirect('tasks');
})->middleware('auth');

Route::middleware('verified')->group(function () {
    Route::group(['middleware' => 'auth:user'], function () {
        // メール認証済みかつログイン済みのユーザーが見れる画面
        Route::get('/home', 'HomeController@index')->name('home');
    });
});

Route::resource('tasks', 'TaskController');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
