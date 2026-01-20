<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RequestController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('{prefix}/{slug}', [PageController::class, 'show']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function() {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'showRegister')->name('show.register');
});

Route::get('/permohonan', [RequestController::class, 'create'])->middleware('auth')->name('request');