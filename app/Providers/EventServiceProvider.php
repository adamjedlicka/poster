<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\PostCreating;
use App\Listeners\NotifyFollowers;
use App\Listeners\ProcessPostHandles;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreating::class => [
            ProcessPostHandles::class,
        ],
        PostCreated::class => [
            NotifyFollowers::class,
        ]
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
