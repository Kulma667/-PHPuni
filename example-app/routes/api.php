<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('Users', [HomeController::class, 'Users']);
Route::get('Base', [HomeController::class, 'Base']);
Route::get('User', [HomeController::class, 'User']);
Route::get('CreateUser', [HomeController::class, 'CreateUser']);
Route::get('ChangePass', [HomeController::class, 'ChangePass']);
Route::get('Token', [HomeController::class, 'Token']);

Route::get('index', function(){
    return ['message' =>'Welcome to User API'];
});
