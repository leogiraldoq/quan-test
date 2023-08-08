<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/login',[AuthController::class,'login']);


Route::post('/users/create',[UsersController::class,'create'])->middleware(['auth:sanctum','ability:Create']);
Route::put('/users/update',[UsersController::class,'update'])->middleware(['auth:sanctum','ability:Update']);
Route::delete('/users/delete',[UsersController::class,'delete'])->middleware(['auth:sanctum','ability:Delete']);
