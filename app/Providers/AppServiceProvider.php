<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Gate::define('isAdmin', function($user) {
            return $user->roles->title == 'Admin';
         });

        Gate::define('isCashier', function($user) {
             return $user->roles->title == 'Cashier';
         });

        Gate::define('isStudent', function($user) {
             return $user->roles->title == 'tudent';
         });
    }
}
