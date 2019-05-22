<?php

namespace App\Listeners;

use Parsedown;
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

        $parsedown = new Parsedown();
        $parsedown->setMarkupEscaped(true);

        $post->html = $parsedown->text(htmlspecialchars($post->text));
    }
}
