<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/home', '/');

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/posts/show/{post}' , [HomeController::class , 'show'])->name('posts.show');