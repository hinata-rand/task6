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
})->middleware('auth')->middleware('verified');

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/tasks', function () {
    return redirect('tasks');
})->middleware('auth')->middleware('verified');

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('tasks', 'TaskController');

Route::get('/logout', function () {
    Auth::logout();
})->middleware('auth')->middleware('verified');

Auth::routes(['verify' => true]);