<?php

namespace App\Listeners;

use App\Events\PostCreated;

class ProcessPostUrls
{
    private static $regex = '/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/=]*)/';

    public function handle(PostCreated $event)
    {
        $post = $event->getPost();

        $post->html = preg_replace_callback(self::$regex, function ($match) {
            $url = $match[0];

            if (preg_match('/^https?\:\/\//', $url) == 0) {
                $url = 'http://' . $url;
            }

            return sprintf(
                '<a href="%s" target="_blank">%s</a>',
                $url,
                $match[0]
            );
        }, $post->html);
    }
}
