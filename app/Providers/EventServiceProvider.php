<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Listeners\NotifyFollowers;
use App\Listeners\ProcessPostTopics;
use App\Listeners\ProcessPostHandles;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PostCreated::class => [
            ProcessPostHandles::class,
            ProcessPostTopics::class,
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
