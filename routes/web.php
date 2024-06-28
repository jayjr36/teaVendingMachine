<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Auth;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/cards/create', [CardController::class, 'create'])->name('cards.create');
Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
Route::post('/cards/topup', [CardController::class, 'topup'])->name('cards.topup');
Route::get('/cards/topup', [CardController::class, 'showTopUpForm'])->name('cards.topup.form');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
