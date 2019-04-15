<?php

namespace App\Listeners;

use App\Events\PostCreating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscapePostHtml
{
    /**
     * Handle the event.
     *
     * @param  PostCreating  $event
     * @return void
     */
    public function handle(PostCreating $event)
    {
        $post = $event->getPost();

        $post->html = htmlspecialchars($post->html);
    }
}
