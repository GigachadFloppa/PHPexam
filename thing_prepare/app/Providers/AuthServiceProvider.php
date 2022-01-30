<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\models\Thing;
use App\Policies\ThingPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Thing::class => ThingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('view-all-things', function(?User $user){
//            $role = Role::where('name', 'user')->value('id');
//            if($user->role_id == $role){
//                return Response::deny('В доступе отказано!');
//            } return Response::allow();
//        });
//
//        Gate::define('do-some-with-thing', function(?User $user){
//            $role = Role::where('name', 'admin')->value('id');
//            if($user->role_id == $role){
//                return Response::deny('В доступе отказано!');
//            } return Response::allow();
//        });
//
//        Gate::define('do-some-with-place', function(?User $user){
//            $role = Role::where('name', 'user')->value('id');
//            if($user->role_id == $role){
//                return Response::deny('В доступе отказано!');
//            } return Response::allow();
//        });
    }
}
