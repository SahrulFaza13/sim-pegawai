<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pegawaiController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [dashboardController::class, 'index'])
        ->name('dashboard');

Route::resource('pegawai', pegawaiController::class);


