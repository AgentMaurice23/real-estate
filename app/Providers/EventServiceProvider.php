<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Listeners\LogAuthenticated;
use Illuminate\Auth\Listeners\LogSuccessfulLogin;
use Illuminate\Auth\Listeners\LogSuccessfulLogout;
use App\Listeners\UpdateLastLogin;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Login::class => [
            UpdateLastLogin::class,
        ],
        Logout::class => [
            LogSuccessfulLogout::class,
        ],
    ];
 
    
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
