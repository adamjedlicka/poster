<?php

namespace App\Observers;

use App\Post;
use App\Events\PostCreated;
use App\Events\PostCreating;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->html = $post->text;

        if ($post->user_id == null) {
            $post->user_id = Auth::id();
        }

        PostCreating::dispatch($post);
    }

    public function created(Post $post)
    {
        Auth::user()->likes()->attach($post);

        PostCreated::dispatch($post);
    }
}
