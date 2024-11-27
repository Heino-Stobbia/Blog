<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

// Auth API Calls
Route::post('login', [AuthController::class ,'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class ,'register']);

// Posts API Calls
Route::post('posts', [PostsController::class , 'create'])->middleware('auth:sanctum');
Route::get('posts', [PostsController::class , 'getPosts']);
Route::get('posts/{id}', [PostsController::class , 'getSinglePost']);
Route::put('posts/{id}', [PostsController::class , 'update'])->middleware('auth:sanctum');
Route::delete('posts/{id}', [PostsController::class , 'destroy'])->middleware('auth:sanctum');

// Comments API Calls
Route::get('posts/{post_id}/comments', [CommentController::class , 'getComments']);
Route::post('posts/{post_id}/comments', [CommentController::class , 'save'])->middleware('auth:sanctum');
Route::put('comments/{id}', [CommentController::class , 'update'])->middleware('auth:sanctum');
Route::delete('comments/{id}', [CommentController::class , 'destroy'])->middleware('auth:sanctum');
