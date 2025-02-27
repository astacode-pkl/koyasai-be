<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LogHistoryController;
use App\Http\Controllers\CompanyProfileController;

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/login',  [UserController::class, 'index'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('company profile');
    Route::put('/company-profile/{id}', [CompanyProfileController::class, 'update']);
    Route::resource('/log-histories', LogHistoryController::class)->except('show');
    // Authentication
    Route::post('/logout', [UserController::class, 'logout']);
    Route::resource('galleries', GalleryController::class)->except('show');
});
