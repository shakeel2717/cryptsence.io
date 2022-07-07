<?php

use App\Http\Controllers\admin\CTSESellController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReferralReportController;
use App\Http\Controllers\user\CalculatorController;
use App\Http\Controllers\user\CoinPaymentController;
use App\Http\Controllers\user\ConvertController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\GoogleAuthController;
use App\Http\Controllers\user\KYCController;
use App\Http\Controllers\user\NftCategoryController;
use App\Http\Controllers\user\NftController;
use App\Http\Controllers\user\NftReferralRewardController;
use App\Http\Controllers\user\NotificationController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\ReferralRewardController;
use App\Http\Controllers\user\ReportController;
use App\Http\Controllers\user\TourWinnerController;
use App\Http\Controllers\user\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/privacy', [LandingPageController::class, 'privacy'])->name('privacy');
Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::resource('index', DashboardController::class);
    Route::get('profile/password/change', [ProfileController::class, 'changePassword'])->name('profile.password.change');
    Route::post('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::resource('profile', ProfileController::class);
    Route::resource('notification', NotificationController::class);
    Route::resource('withdraw', WithdrawController::class)->middleware('kyc');
    Route::resource('kyc', KYCController::class);
    Route::get('profile/recent/login', [ProfileController::class, 'recentLogin'])->name('profile.recent.login');
    Route::resource('payment', PaymentController::class);
    Route::resource('convert', ConvertController::class);
    Route::resource('sell', CTSESellController::class);
    Route::resource('tour', TourWinnerController::class);
    Route::resource('nft', NftController::class);
    Route::resource('nft_category', NftCategoryController::class);
    Route::get('report/transactions/recent', [ReportController::class, 'recent'])->name('report.transactions.recent');
    Route::get('report/transactions/deposits', [ReportController::class, 'deposits'])->name('report.transactions.deposits');
    Route::get('report/transactions/withdrawals', [ReportController::class, 'withdrawals'])->name('report.transactions.withdrawals');
    Route::get('report/transactions/convert', [ReportController::class, 'convert'])->name('report.transactions.convert');
    Route::get('report/transactions/allStackingBounces', [ReportController::class, 'allStackingBounces'])->name('report.transactions.allStackingBounces');
    Route::get('report/transactions/allRefers', [ReportController::class, 'allRefers'])->name('report.transactions.allRefers');
    Route::get('report/transactions/allRewards', [ReportController::class, 'allRewards'])->name('report.transactions.allRewards');
    Route::get('report/transactions/nft', [ReportController::class, 'nft'])->name('report.transactions.nft');
    Route::get('report/transactions/nft/profit', [ReportController::class, 'nftProfit'])->name('report.transactions.nft.profit');
    Route::get('google/googleEdit', [GoogleAuthController::class, 'googleEdit'])->name('dashboard.google.googleEdit');
    Route::post('google/googleUpdate', [GoogleAuthController::class, 'googleUpdate'])->name('dashboard.google.googleUpdate');
    Route::resource('google', GoogleAuthController::class);
    Route::post('calculator/calReq', [CalculatorController::class, 'calculateReq'])->name('calculator.calculateReq');
    Route::resource('calculator', CalculatorController::class);
    Route::controller(ReferralReportController::class)->prefix('/referral')->name('referral.')->group(function () {
        Route::get('direct', 'direct')->name('direct');
        Route::get('level/1', 'level1')->name('level1');
        Route::get('level/2', 'level2')->name('level2');
        Route::get('level/3', 'level3')->name('level3');
    });

    Route::controller(NftReferralRewardController::class)->prefix('/nft/referral')->name('nft.referral.')->group(function () {
        Route::get('direct', 'direct')->name('direct');
        Route::get('level/1', 'level1')->name('level1');
        Route::get('level/2', 'level2')->name('level2');
        Route::get('level/3', 'level3')->name('level3');
    });

    Route::controller(ReferralRewardController::class)->prefix('/referral')->name('referral.')->group(function () {
        Route::post('stack', 'stack')->name('stack');
    });
});

// group route
Route::prefix('payment')->group(function () {
    Route::post('/webhook', [CoinPaymentController::class, 'webhook'])->name('webhook');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
