<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Auth\EloquentUserProvider;
use App\Extensions\EloquentUserProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // 通过自定义的 EloquentUserProvider 覆盖系统默认的
        Auth::provider('eloquent', function ($app, $config) {
            return new EloquentUserProvider($app->make('hash'), $config['model']);
        });

        //
        $this->registerPolicies();
    }
}
