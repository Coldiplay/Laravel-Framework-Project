<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        //

//        Gate::define('post-view', [PostPolicy::class, 'view']);
//        Gate::define('post-view-any', [PostPolicy::class, 'viewAny']);
//        Gate::define('post-update', [PostPolicy::class, 'update']);
        Gate::define('delete', [PostPolicy::class, 'delete']);
//        Gate::define('post-create', [PostPolicy::class, 'create']);

        Gate::before(function (User $user) {
            //return $user->role === 'admin';
            return $user->role === 'admin' ? true : null;
        });
    }
}
