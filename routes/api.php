<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\CompanyProfileController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EmbedController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\NewsController;

use App\Http\Controllers\Api\IndexController;
Route::apiResource('/doc', IndexController::class);

Route::apiResource('/catalog', CatalogController::class);

Route::apiResource('/companyprofile', CompanyProfileController::class);

Route::apiResource('/contact', ContactController::class);

Route::apiResource('/client', ClientController::class);

Route::apiResource('/embed', EmbedController::class);

Route::apiResource('/gallery', GalleryController::class);

Route::apiResource('/hero', HeroController::class);

Route::apiResource('/news', NewsController::class);

