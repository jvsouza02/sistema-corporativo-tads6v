<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('barbearia-access', function (User $user) {
            return in_array($user->role, ['proprietario', 'barbeiro']);
        });

        Gate::define('proprietario-access', function (User $user) {
            return $user->role === 'proprietario';
        });

        Gate::define('barbeiro-access', function (User $user) {
            return $user->role === 'barbeiro';
        });

        Gate::define('cliente-access', function ($user) {
            return $user->role === 'cliente';
        });

        Paginator::useBootstrap();
    }
}
