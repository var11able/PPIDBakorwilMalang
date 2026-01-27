<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRequestController;
use App\Http\Controllers\Admin\AdminDocumentController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'showRegister')->name('show.register');
    Route::post('/register', 'register')->name('register');
});

Route::middleware('auth')->controller(RequestController::class)->group(function () {
    Route::get('/permohonan', 'create')->name('request.create');
    Route::post('/permohonan', 'store')->name('request.store');
    Route::get('/keberatan', 'complaint')->name('request.complaint');
    Route::get('/keberatan/{parentId}', 'showComplaint')->name('request.complaint.form');
    Route::post('/keberatan/{parentId}', 'storeComplaint')->name('request.complaint.store');
});

Route::prefix('admin')->middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/requests', [AdminRequestController::class, 'index'])->name('admin.requests.index');
    Route::get('/requests/{id}', [AdminRequestController::class, 'show'])->name('admin.requests.show');
    Route::put('/requests/{id}', [AdminRequestController::class, 'update'])->name('admin.requests.update');

    Route::get('/documents', [AdminDocumentController::class, 'index'])->name('admin.documents.index');

    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');

    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports.index');

    Route::get('/settings', [AdminSettingController::class, 'index'])->name('admin.settings.index');
    Route::put('/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/history', [UserDashboardController::class, 'history'])->name('user.history');
    Route::get('/history/{id}', [UserDashboardController::class, 'show'])->name('user.request.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('{prefix}/{slug}', [PageController::class, 'show']);
