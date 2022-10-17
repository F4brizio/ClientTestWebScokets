<?php

use BeyondCode\LaravelWebSockets\Statistics\Rules\AppId;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('message/index', [App\Http\Controllers\MessageController::class, 'index'])->name('message.index');
Route::get('message/send', [App\Http\Controllers\MessageController::class, 'send'])->name('message.send');

Route::get('test', function () {
    broadcast(new App\Events\NewMessage('Hello World'))->via('pusher');
});
