<?php

use App\Http\Controllers\user\CoinPaymentController;
use App\Http\Controllers\user\ConvertController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\GoogleAuthController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\ReportController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::resource('index', DashboardController::class);
    Route::get('profile/password/change', [ProfileController::class, 'changePassword'])->name('profile.password.change');
    Route::post('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::resource('profile', ProfileController::class);
    Route::get('profile/recent/login', [ProfileController::class, 'recentLogin'])->name('profile.recent.login');
    Route::resource('payment', PaymentController::class);
    Route::resource('convert', ConvertController::class);
    Route::get('report/transactions/recent', [ReportController::class, 'recent'])->name('report.transactions.recent');
    Route::get('report/transactions/deposits', [ReportController::class, 'deposits'])->name('report.transactions.deposits');
    Route::get('report/transactions/withdrawals', [ReportController::class, 'withdrawals'])->name('report.transactions.withdrawals');
    Route::get('report/transactions/convert', [ReportController::class, 'convert'])->name('report.transactions.convert');
    Route::get('report/transactions/dailyProfit', [ReportController::class, 'dailyProfit'])->name('report.transactions.dailyProfit');
    Route::get('google/googleEdit', [GoogleAuthController::class, 'googleEdit'])->name('dashboard.google.googleEdit');
    Route::post('google/googleUpdate', [GoogleAuthController::class, 'googleUpdate'])->name('dashboard.google.googleUpdate');
    Route::resource('google', GoogleAuthController::class);

});


// group route
Route::prefix('payment')->group(function () {
    Route::post('/webhook', [CoinPaymentController::class, 'webhook'])->name('webhook');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
