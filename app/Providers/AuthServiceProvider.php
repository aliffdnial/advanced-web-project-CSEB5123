<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isManager', function ($user){
            return $user->usertype == 0;
            });
            
        Gate::define('isABU', function ($user){
            return $user->usertype == 1;
            });

        Gate::define('isADev', function ($user){
            return $user->usertype == 2;
            });

        // Gate::define('isLeadDev', function ($user){
        //     return $user->usertype == 3;
        //     });
           
    }
}
