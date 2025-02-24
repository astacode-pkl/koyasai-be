<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            static $companyProfile = null;

            if ($companyProfile === null) {
                $companyProfile = \App\Models\CompanyProfile::first()->get();
                foreach ($companyProfile as $item) {
                    $companyProfile = $item;
                }
            }

            $view->with('companyProfile', $companyProfile);
        });
    }
}
