<?php

namespace App\Listeners;

use App\Topic;
use App\Events\PostCreated;

class ProcessPostTopics
{
    public function handle(PostCreated $event)
    {
        $post = $event->getPost();

        $post->html = preg_replace_callback('/#\w+/', function ($match) {
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
        }, $post->html);

        $post->save();
    }
}
