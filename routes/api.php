<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\BoardController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('login', [ApiAuthController::class, 'index']);
Route::post('registration', [ApiAuthController::class, 'registration']);

Route::post('task',[TaskController::class,'addTask'])->middleware('auth:sanctum');
Route::get('task',[TaskController::class,'taskList'])->middleware('auth:sanctum');
Route::get('task/{id}',[TaskController::class,'viewTask'])->middleware('auth:sanctum');
Route::delete('task/{id}',[TaskController::class,'deleteTask'])->middleware('auth:sanctum');
Route::put('task/{id}',[TaskController::class,'editTask'])->middleware('auth:sanctum');
Route::put('/task/$id/complete',[TaskController::class,'markDone'])->middleware('auth:sanctum');
Route::delete('/task/$id/complete',[TaskController::class,'markUndone'])->middleware('auth:sanctum');
Route::post('/board',[BoardController::class,'createBoard'])->middleware('auth:sanctum');
Route::get('/board',[BoardController::class,'boardList'])->middleware('auth:sanctum');
Route::get('/board/{id}',[BoardController::class,'viewBoard'])->middleware('auth:sanctum');
Route::delete('/board/{id}',[BoardController::class,'deleteBoard'])->middleware('auth:sanctum');
Route::get('/board/{id}/tasks',[BoardController::class,'tasksOfBoard'])->middleware('auth:sanctum');
Route::put('/board/{id}/tasks',[BoardController::class,'addTasksToBoard'])->middleware('auth:sanctum');
Route::put('/board/{id}/access',[BoardController::class,'giveAccessToUser'])->middleware('auth:sanctum');
Route::delete('/board/{id}/access',[BoardController::class,'takeAccessFromUser'])->middleware('auth:sanctum');
Route::get('/board/{id}/access',[BoardController::class,'getAccessForBoard'])->middleware('auth:sanctum');


