<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Contact;

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
        if($this->app->runningInConsole()) {
            return;
        }
        $contacts = Contact::orderByDesc('status')->orderByDesc('created_at')->get();
        View::share('contacts', $contacts);

        
        View::composer('*', function ($view) {

            static $companyProfile = null;

            if ($companyProfile === null) {
                $companyProfile = \App\Models\CompanyProfile::select(['name','logo_mark','logo_type'])->get();
                foreach ($companyProfile as $item) {
                    $companyProfile = $item;
                }
            }

            $view->with('companyProfile', $companyProfile);
        });
    }
}
