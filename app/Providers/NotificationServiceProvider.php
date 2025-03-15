<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $user = auth()->user();

            if ($user) {
                $notifications = $user->notifications;
                $unreadNotificationsCount = $user->unreadNotifications->count();

                $view->with('notifications', $notifications)
                     ->with('unreadNotificationsCount', $unreadNotificationsCount);
            }
        });
    }
}
