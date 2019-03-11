<?php

namespace App\Listeners;

use App\User;
use App\Events\PostCreating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessPostHandles
{
    /**
     * Handle the event.
     *
     * @param  PostCreating  $event
     * @return void
     */
    public function handle(PostCreating $event)
    {
        $event->getPost()->html = preg_replace_callback('/@(\w+)/', function ($match) {
            $user = User::where('handle', $match[1])->first();

            if ($user == null) {
                return $match[0];
            }

            return sprintf(
                '<a href="%s">%s</a>',
                route('users.show', $user),
                $match[0],
            );
        }, $event->getPost()->html);
    }
}
