<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

});
