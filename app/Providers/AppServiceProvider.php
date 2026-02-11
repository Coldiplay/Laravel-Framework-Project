<?php

namespace App\Providers;

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
        //Route::pattern('slug', '[a-]+');
        Gate::define('post-view', [PostPolicy::class, 'view']);
        Gate::define('post-view-any', [PostPolicy::class, 'viewAny']);
        Gate::define('post-update', [PostPolicy::class, 'update']);
        Gate::define('post-delete', [PostPolicy::class, 'delete']);
        Gate::define('post-create', [PostPolicy::class, 'create']);
    }
}
