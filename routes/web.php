<?php

use App\Http\Controllers\CompanyProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/login',  [UserController::class, 'index'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('company profile');
    Route::put('/company-profile/{id}', [CompanyProfileController::class, 'update']);

    // Authentication
    Route::post('/logout', [UserController::class, 'logout']);
});
