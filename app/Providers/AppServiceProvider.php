<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Post::class, PostPolicy::class);

        //Route::pattern('slug', '[a-]+');
        Gate::before(function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('post-view', [PostPolicy::class, 'view']);
        Gate::define('post-view-any', [PostPolicy::class, 'viewAny']);
        Gate::define('post-update', [PostPolicy::class, 'update']);
        Gate::define('post-kill', [PostPolicy::class, 'kill']);
        Gate::define('post-create', [PostPolicy::class, 'create']);
    }
}
