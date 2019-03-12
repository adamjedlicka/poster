<?php

namespace App\Listeners;

use App\User;
use App\Topic;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewPostInFollowedTopic;

class NotifyTopicFollowers
{
    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $post = $event->getPost();

        $post->topics->each(function (Topic $topic) use ($post) {
            $topic->followers->each(function (User $user) use ($post, $topic) {
                if (Auth::id() == $user->getKey()) {
                    return;
                }

                foreach ($user->unreadNotifications as $notification) {
                    if (
                        $notification->type == NewPostInFollowedTopic::class
                        && $notification->data['topic']['id'] == $topic->getKey()
                    ) {
                        return;
                    }
                }

                $user->notify(new NewPostInFollowedTopic($post, $topic));
            });
        });
    }
}
