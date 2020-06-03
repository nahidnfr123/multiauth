<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        # Assign Gates for each roles ....
        Gate::define('manage-users', static function ($user){
            return $user->hasAnyRoles(['super_admin', 'admin',]);
        });

        Gate::define('edit-users', static function ($user){
            return $user->hasAnyRoles(['super_admin', 'admin',]);
        });

        Gate::define('delete-users', static function ($user){
            return $user->hasAnyRoles(['super_admin', 'admin',]);
        });

        /// Example code for ... setting user ...
        /*
        Gate::define('view-users', function ($user){
            return $user->hasRole('admin');
        });
        */
    }
}
