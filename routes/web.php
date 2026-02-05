<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRequestController;
use App\Http\Controllers\Admin\AdminDocumentController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

if (app()->environment('local')) {
    Route::get('/mail-preview', function () {
        $user = new \App\Models\User([
            'fullName' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $notification = new \App\Notifications\VerificationCodeNotification('123456');
        return $notification->toMail($user)->render();
    });
}

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'showRegister')->name('show.register');
    Route::post('/register', 'register')->name('register');
});

Route::middleware('guest')->controller(PasswordResetController::class)->group(function () {
    Route::get('/forgot-password', 'showForgotForm')->name('password.request');
    Route::post('/forgot-password', 'sendResetLink')->name('password.email');
    Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class, 'showVerifyForm'])
        ->name('verification.notice');

    Route::post('/email/verify', [App\Http\Controllers\VerificationController::class, 'verify'])
        ->name('verification.verify');

    Route::post('/email/resend', [App\Http\Controllers\VerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(RequestController::class)->group(function () {
        Route::get('/permohonan', 'create')->name('request.create');
        Route::post('/permohonan', 'store')->name('request.store');
        Route::get('/keberatan', 'complaint')->name('request.complaint');
        Route::get('/keberatan/{parentId}', 'showComplaint')->name('request.complaint.form');
        Route::post('/keberatan/{parentId}', 'storeComplaint')->name('request.complaint.store');
    });

    Route::prefix('dashboard')->group(function () {
        Route::controller(UserDashboardController::class)->group(function () {
            Route::get('/', 'index')->name('user.dashboard');
            Route::get('/history', 'history')->name('user.history');
            Route::get('/history/{id}', 'show')->name('user.request.show');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::put('/profile', 'update')->name('profile.update');
        });
    });

    Route::prefix('admin')->middleware('role:admin,staff')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::controller(AdminRequestController::class)->group(function () {
            Route::get('/requests', 'index')->name('admin.requests.index');
            Route::get('/requests/{id}', 'show')->name('admin.requests.show');
            Route::put('/requests/{id}', 'update')->name('admin.requests.update');
        });

        Route::get('/documents', [AdminDocumentController::class, 'index'])->name('admin.documents.index');
        Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports.index');

        Route::controller(AdminUserController::class)->group(function () {
            Route::get('/users', 'index')->name('admin.users.index');
            Route::get('/users/{id}', 'show')->name('admin.users.show');
        });

        Route::controller(AdminSettingController::class)->group(function () {
            Route::get('/settings', 'index')->name('admin.settings.index');
            Route::put('/settings', 'update')->name('admin.settings.update');
        });
    });

});

Route::get('{prefix}/{slug}', [PageController::class, 'show']);

Route::get('/gallery', [ContentController::class, 'index'])->name('gallery.index');