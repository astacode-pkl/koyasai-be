<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
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
    Route::resource('/categories', CategoryController::class)->except('show');
    // Route::resource('/heroes', HeroController::class)->except('show')->name('store','store.heroes');
    Route::controller(HeroController::class)->group(function () {
        Route::post('/heroes/update-position', 'updatePosition')->name('update.heroes');
        Route::get('/heroes', 'index');
        Route::get('/heroes/edit/{id}', 'edit');
        Route::get('/heroes/create', 'create');
        Route::post('/heroes', 'store')->name('store.heroes');
        Route::get('/heroes/delete/{id}', 'destroy')->name('destroyHero');
        Route::put('/heroes/update/{id}', 'update')->name('update.heroes');
    });
    Route::controller(AccountController::class)->group(function(){
        Route::get('/account-settings','edit')->name('account.edit');
        Route::put('/account-settings/update-password', 'updatePassword')->name('password.update');
        Route::patch('/account-settings/update', 'updateAccount')->name('account.update');
    });

    Route::resource('/services', ServiceController::class)->except('show');
    // Authentication
    Route::post('/logout', [UserController::class, 'logout']);
    Route::resource('/galleries', GalleryController::class)->except('show');
    Route::resource('/news', NewsController::class)->except('show');
});
