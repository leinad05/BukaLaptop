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
        /*
        Gate::define('access-permission', function($user){
            return ($user->sebagai == 'pegawai');
        });
        */
        
        Gate::define('access-permission-transaction', 'App\Policies\TransactionPolicy@access');
        Gate::define('delete-permission-transaction', 'App\Policies\TransactionPolicy@delete');
        Gate::define('buy-permission-transaction', 'App\Policies\TransactionPolicy@buy');
        
        Gate::define('access-permission-product', 'App\Policies\ProductPolicy@access');
        Gate::define('cart-permission-product', 'App\Policies\ProductPolicy@cart');

        Gate::define('access-permission-brand', 'App\Policies\BrandPolicy@access');
        Gate::define('access-permission-category', 'App\Policies\BrandPolicy@access');

        Gate::define('access-permission-HR', 'App\Policies\HrPolicy@access');
        /*
        Gate::define('edit-settings', function($user){
            return ($user->sebagai == 'employee');
        });
        */
        //dengan policies
        //Gate::define('update-post', 'App\Policies\PostPolicies@update');
        //
    }
}
