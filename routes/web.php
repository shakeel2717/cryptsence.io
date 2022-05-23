<?php

use App\Http\Controllers\user\CoinPaymentController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::resource('index', DashboardController::class);
    Route::get('profile/password/change', [ProfileController::class, 'changePassword'])->name('profile.password.change');
    Route::post('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('profile/recent/login', [ProfileController::class, 'recentLogin'])->name('profile.recent.login');
    Route::resource('profile', ProfileController::class);
    Route::resource('payment', PaymentController::class);
});


// group route
Route::prefix('payment')->group(function () {
    Route::post('/webhook', [CoinPaymentController::class, 'webhook'])->name('webhook');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
