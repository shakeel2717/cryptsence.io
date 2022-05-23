<?php

use App\Http\Controllers\user\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::resource('index', DashboardController::class);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
