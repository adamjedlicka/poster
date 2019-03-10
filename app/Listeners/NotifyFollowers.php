<?php

namespace App\Listeners;

use App\User;
use App\Events\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewPostFromFollower;

class NotifyFollowers
{
    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $event->post->user->followers->each(function (User $follower) use ($event) {
            $follower->notify(new NewPostFromFollower($event->post));
        });
    }
}
