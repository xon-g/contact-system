<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('update-contact', function ($user, $contact) {
            return $user->id === $contact->user_id;
        });

        Gate::define('delete-contact', function ($user, $contact) {
            return $user->id === $contact->user_id;
        });

        Gate::define('view-contact', function ($user, $contact) {
            return $user->id === $contact->user_id;
        });
    }
}



