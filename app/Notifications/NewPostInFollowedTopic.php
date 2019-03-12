<?php

namespace App\Notifications;

use App\Post;
use App\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPostInFollowedTopic extends Notification
{
    use Queueable;

    /**
     * @var Post
     */
    private $post;

    /**
     * @var Topic
     */
    private $topic;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post, Topic $topic)
    {
        $this->post = $post;
        $this->topic = $topic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'template' => 'newPostInFollowedTopic',
            'post' => $this->post,
            'topic' => $this->topic,
        ];
    }
}
