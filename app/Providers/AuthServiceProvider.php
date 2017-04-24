<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permissions;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Businesses' => 'App\Policies\BusinessesPolicy',
        'App\Products' => 'App\Policies\ProductsPolicy',
        'App\Order' => 'App\Policies\OrderPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     * 
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        foreach ($this->getPermissions() as $permission) {
             $gate->define($permission->name, function($user) use ($permission){
                 return $user->hasRole($permission->roles);
             });
        }
    }

    /**
     * [getPermissions Eager load All permissions with the accompanying Roles]
     * @return [type] [Collection of Roles]
     */
    protected function getPermissions()
    {
        try {
            return Permissions::with('roles')->get();

         } 
        /*Catch the error exception and return as an empty collection so
        migrations can be ran*/
        catch (\Exception $e) {
            return [];
        }
    }
}
