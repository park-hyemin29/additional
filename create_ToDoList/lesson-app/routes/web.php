<?php

use App\Http\Controllers\PageController; 
use App\Http\Controllers\PostController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('about');});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/posts/completed', [PostController::class, 'completed'])->name('posts.completed');
Route::patch('/posts/{post}/complete', [PostController::class, 'complete'])->name('posts.complete');
Route::patch('/posts/{post}/cancel', [PostController::class, 'cancel'])->name('posts.cancel');

Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);