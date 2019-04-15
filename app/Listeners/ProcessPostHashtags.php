<?php

namespace App\Listeners;

use App\Topic;
use App\Events\PostCreated;

class ProcessPostHashtags
{
    public function handle(PostCreated $event)
    {
        $post = $event->getPost();
        $topics = [];

        $post->html = preg_replace_callback('/#\w+/', function ($match) use (&$topics) {
            $lowered = strtolower($match[0]);

            $topic = Topic::where('name', $lowered)->first();

            if ($topic == null) {
                $topic = Topic::create([
                    'name' => $lowered,
                ]);
            }

            $topics[] = $topic->getKey();

            return sprintf(
                '<a href="%s">%s</a>',
                route('topics.show', $topic),
                $match[0]
            );
        }, $post->html);

        $post->save();

        $post->topics()->sync($topics);
    }
}
