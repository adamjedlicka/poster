<?php

namespace App\Observers;

use App\Post;
use App\Events\PostCreated;
use App\Events\PostCreating;

class PostObserver
{
    public function creating(Post $post)
    {
        PostCreating::dispatch($post);
    }

    public function created(Post $post)
    {
        PostCreated::dispatch($post);
    }
}
