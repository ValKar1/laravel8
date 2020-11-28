<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\VideoChatController;

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

Route::get('start-pusher-event', [BroadcastController::class, 'eventPusher']);
Route::get('show-pusher-event', [BroadcastController::class, 'showPusher']);
Route::get('create-user', [BroadcastController::class, 'createUser']);
Route::get('login-user', [BroadcastController::class, 'loginUser']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/temp', [App\Http\Controllers\TempController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('video_chat', [VideoChatController::class, 'index']);
    Route::post('auth/video_chat', [VideoChatController::class, 'auth']);
});