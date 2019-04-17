<?php

namespace App\Observers;

use App\Post;
use App\Events\PostCreated;
use App\Events\PostCreating;
use Illuminate\Support\Facades\Auth;
use App\Events\PostDeleting;

class PostObserver
{
    public function creating(Post $post)
    {
        if ($post->user_id == null) {
            $post->user_id = Auth::id();
        }

        PostCreating::dispatch($post);
    }

    public function created(Post $post)
    {
        $post->user->likes()->attach($post);

        PostCreated::dispatch($post);
    }

    public function deleting(Post $post)
    {
        PostDeleting::dispatch($post);
    }
}
