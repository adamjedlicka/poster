<?php

namespace App\Listeners;

use App\Topic;
use App\Events\PostCreating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessPostTopics
{
    /**
     * Handle the event.
     *
     * @param  PostCreating  $event
     * @return void
     */
    public function handle(PostCreating $event)
    {
        $event->getPost()->html = preg_replace_callback('/#\w+/', function ($match) {
            $lowered = strtolower($match[0]);

            $topic = Topic::where('name', $lowered)->first();

            if ($topic == null) {
                $topic = Topic::create([
                    'name' => $lowered,
                ]);
            }

            return sprintf(
                '<a href="%s">%s</a>',
                route('topics.show', $topic),
                $match[0],
            );
        }, $event->getPost()->html);
    }
}
