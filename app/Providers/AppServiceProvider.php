<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading(); //prohibit lazy loading(n+1) queries from here
        /**
         * Paginator::useBootstrapFive(); // pick pagination views from here
         * Paginator::$defaultView(); // default pagination view
         */

        Gate::define('edit-job',function (User $user, Job $job){
            return $job->employer->user->is($user);
        });
    }
}
