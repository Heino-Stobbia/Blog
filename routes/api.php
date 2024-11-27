<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::apiResources('hello', AuthController::class);
Route::get('login', [AuthController::class ,'login']);
Route::get('register', [AuthController::class ,'register']);

Route::get('index', [AuthController::class ,'index']);
Route::get('store', [AuthController::class ,'store']);
Route::get('show/{id}', [AuthController::class ,'show']);
Route::get('update/{id}', [AuthController::class ,'update']);
Route::get('destroy/{id}', [AuthController::class ,'destroy']);
