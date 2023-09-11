<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AutenticatedSessionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// laravel9.test => welcome



Route::view('/','welcome')->name('home');

Route::view('/contacto','contact')->name('contact');



Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

Route::get('/blog/create',[PostController::class, 'create'])->name('posts.create');

Route::post('/blog' , [PostController::class, 'store'])->name('posts.store');

Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::view('/about','about')->name('about');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

//Login

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AutenticatedSessionController::class, 'store']);
Route::post('/logout', [AutenticatedSessionController::class, 'destroy'])->name('logout');

// Route::view('/registro', 'auth.register')->name('registro');

// Route::post('/validar-registro',[LoginController::class,'register'])->name('validar-registro');
// Route::post('/iniciar-session',[LoginController::class,'login'])->name('iniciar-sesion');
// Route::post('/logout',[LoginController::class,'logout'])->name('logout');


