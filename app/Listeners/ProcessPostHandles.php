<?php

namespace App\Listeners;

use App\User;
use App\Events\PostCreated;

class ProcessPostHandles
{
    public function handle(PostCreated $event)
    {
        $post = $event->getPost();

        $post->html = preg_replace_callback('/@(\w+)/', function ($match) {
            $user = User::where('handle', $match[1])->first();

            if ($user == null) {
                return $match[0];
            }

            return sprintf(
                '<a href="%s">%s</a>',
                route('users.show', $user),
                $match[0],
            );
        }, $post->html);
    }
}
