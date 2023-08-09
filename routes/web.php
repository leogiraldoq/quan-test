<?php

use App\Http\Controllers\Web\ViewFrontController;
use App\Http\Controllers\Web\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ViewFrontController::class,'login'])->name('login');
Route::get('/logout',[UsersController::class,'logout'])->name('logout');
Route::get('/usercreate',[ViewFrontController::class,'usercreate'])->name('usercreate');
Route::get('/userupdate/{id}',[ViewFrontController::class,'userupdate'])->name('userupdate');
//Api Consumes
Route::post('authuser',[UsersController::class,'authUser'])->name('authuser');
Route::post('userApiCreate',[UsersController::class,'createUser'])->name('userApiCreate');
