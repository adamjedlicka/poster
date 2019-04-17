<?php

namespace App\Events;

use App\Post;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PostDeleting
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Post
     */
    private $post;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return \App\Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
