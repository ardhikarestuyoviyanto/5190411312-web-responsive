<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
    return redirect()->to('/login');
});

Route::get('login', [AuthController::class, 'loginView']);
Route::get('register', [AuthController::class, 'registerView']);
Route::post('registerHandler', [AuthController::class, 'registerHandler']);
Route::post('loginHandler', [AuthController::class, 'loginHandler']);
Route::get('logoutHandler', [AuthController::class, 'logoutHandler']);

Route::middleware('authenticate')->group(function(){
    Route::get('dashboard', [HomeController::class, 'dashboard']);
});