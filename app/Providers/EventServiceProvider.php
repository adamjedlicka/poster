<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\PostCreating;
use App\Listeners\EscapePostHtml;
use App\Listeners\NotifyFollowers;
use App\Listeners\ProcessPostHandles;
use App\Listeners\ProcessPostHashtags;
use App\Listeners\NotifyTopicFollowers;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PostCreating::class => [
            EscapePostHtml::class,
        ],
        PostCreated::class => [
            ProcessPostHandles::class,
            ProcessPostHashtags::class,
            NotifyFollowers::class,
            NotifyTopicFollowers::class,
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
