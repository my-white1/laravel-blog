<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/home', '/');

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/posts/show/{post}' , [HomeController::class , 'show'])->name('posts.show');

// Admin :) 

Route::get('/categories' , [CategoryController::class , 'index'])->name('category');
Route::get('/categories/edit/{category}' , [CategoryController::class , 'edit'])->name('category.edit');
Route::get('/categories/show/{category}' , [CategoryController::class , 'show'])->name('category.show');
Route::post('/categories/update/{category}' , [CategoryController::class , 'update'])->name('category.update');
Route::get('/categories/create' , [CategoryController::class , 'create'])->name('category.create');
Route::post('/categories/store' , [CategoryController::class , 'store'])->name('category.store');
Route::delete('/categories/destroy/{category}' , [CategoryController::class , 'destroy'])->name('category.destroy');



Route::get('/post' , [PostController::class , 'index'])->name('post');
Route::get('/post/show/{post}' , [PostController::class , 'show'])->name('post.show');
Route::get('/post/edit/{post}' , [PostController::class , 'edit'])->name('post.edit');
Route::post('/post/update/{post}' , [PostController::class , 'update'])->name('post.update');
Route::get('/post/create' , [PostController::class , 'create'])->name('post.create');
Route::post('/post/store' , [PostController::class , 'store'])->name('post.store');
Route::delete('/post/destroy/{post}' , [PostController::class , 'destroy'])->name('post.destroy');