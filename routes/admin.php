<?php

use App\Http\Controllers\admin\AdminDepositFundsController;
use App\Http\Controllers\admin\AdminLogController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FinanceController;
use App\Http\Controllers\admin\OptionController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\PolicyController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\UserLogin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('index', DashboardController::class);
    Route::get('profile/password/change', [ProfileController::class, 'changePassword'])->name('profile.password.change');
    Route::post('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('profile/recent/login', [ProfileController::class, 'recentLogin'])->name('profile.recent.login');
    Route::resource('profile', ProfileController::class);
    Route::get('admin/deposit/usdt', [AdminDepositFundsController::class, 'usdt'])->name('deposit.usdt');
    Route::get('admin/deposit/ctse', [AdminDepositFundsController::class, 'ctse'])->name('deposit.ctse');
    Route::get('payment/pending', [PaymentController::class, 'pending'])->name('payment.pending');
    Route::get('payment/complete', [PaymentController::class, 'complete'])->name('payment.complete');
    Route::resource('payment', PaymentController::class);
    Route::resource('finance', FinanceController::class);
    Route::resource('policy', PolicyController::class);
    Route::resource('logentry', AdminLogController::class);

    Route::get('login/{id?}', [UserLogin::class, 'usersLogin'])->name('user.login');

    Route::get('/options/index', [OptionController::class, 'index'])->name('option.index');
    Route::get('report/users', [ReportController::class, 'users'])->name('report.users');
    Route::get('report/deposits', [ReportController::class, 'deposits'])->name('report.deposits');
    Route::get('report/withdrawals', [ReportController::class, 'withdrawals'])->name('report.withdrawals');
    Route::get('report/convert', [ReportController::class, 'convert'])->name('report.convert');
    Route::get('report/dailyProfit/allStackingBounces', [ReportController::class, 'allStackingBounces'])->name('report.allStackingBounces');

    Route::get('withdrawals/approve/{id}', [ReportController::class, 'withdrawApprove'])->name('withdrawals.approve');
});
