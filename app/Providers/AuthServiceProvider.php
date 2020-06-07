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
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin', function($user){
            return count(array_intersect(["admin"], json_decode($user->roles)));
        });
        Gate::define('kepala', function($user){
            return count(array_intersect(["kepala"], json_decode($user->roles)));
        });
<<<<<<< HEAD
=======

>>>>>>> a0e994ae52856480ec5f4b7de76a9a3bed54bebd
    }
}
