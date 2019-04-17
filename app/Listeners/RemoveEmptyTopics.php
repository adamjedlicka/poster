<?php

namespace App\Listeners;

use App\Events\PostDeleting;

class RemoveEmptyTopics
{
    /**
     * Handle the event.
     *
     * @param  PostDeleting  $event
     * @return void
     */
    public function handle(PostDeleting $event)
    {
        $event->getPost()->topics->each(function ($topic) {
            if ($topic->posts()->count() == 1) {
                $topic->delete();
            }
        });
    }
}
