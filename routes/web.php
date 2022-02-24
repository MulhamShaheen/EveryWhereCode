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
    return view('home');
});
Route::get('/main', [App\Http\Controllers\HomeController::class, 'main'])->name('main');
Route::get('/signin/', function () {
    return view('auth/register');
});
Route::get('/signup/', function () {
    return view('auth/my-signup');
});
Route::get('/bitrixtest/', function () {
    return view('bitrixtest');
});
Route::get('/feedback/', function () {
    return view('feedback');
});
Route::post('/bitrixtest/', function () {
    return view('bitrixtest');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
