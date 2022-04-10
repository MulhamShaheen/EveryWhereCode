<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return redirect('home');
});

//Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
//Route::get('logout', [CustomAuthController::class, 'signOut'])->name('logout');
Route::post('customRegistration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
//Route::post('customLogin', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('main', [CustomAuthController::class, 'main']);

//Route::post('login', [ApiAuthController::class, 'index']);
//Route::post('registration', [ApiAuthController::class, 'registration']);



//Route::post('api/task',[TaskController::class,'newTask'])->middleware('auth:sanctum');
Route::get('api/task/{id}',[TaskController::class,'viewTask'])->middleware('auth:sanctum');
Route::delete('api/task/{id}',[TaskController::class,'deleteTask'])->middleware('auth:sanctum');
Route::put('api/task/{id}',[TaskController::class,'editTask'])->middleware('auth:sanctum');
Route::put('api/task/{id}/complete',[TaskController::class,'markDone'])->middleware('auth:sanctum');
Route::delete('api/task/{id}/complete',[TaskController::class,'markUndone'])->middleware('auth:sanctum');
