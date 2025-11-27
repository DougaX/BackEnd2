<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Gate: Apenas admin tem acesso total
        Gate::define('admin-only', function ($user) {
            return $user->isAdmin();
        });

        // Gate: Professores e admins podem gerenciar salas
        Gate::define('manage-salas', function ($user) {
            return $user->isProfessor() || $user->isAdmin();
        });
    }
}