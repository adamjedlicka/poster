<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'handle',
        'description',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes(? Post $post = null)
    {
        if ($post != null) {
            return $this->likes->find($post);
        }

        return $this->belongsToMany(Post::class, 'likes');
    }

    public function follows(? User $user = null)
    {
        if ($user != null) {
            return $this->follows->find($user);
        }

        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function getAvatarAttribute()
    {
        return $this->avatar_path
            ? asset($this->avatar_path)
            : "https://ui-avatars.com/api/?name=$this->first_name+$this->last_name&size=132";
    }

    public function getFollowerCountAttribute()
    {
        return Cache::remember("users.$this->id.followerCount", now()->addHour(), function () {
            return $this->followers()->count();
        });
    }

    public function getPostCountAttribute()
    {
        return Cache::remember("users.$this->id.postCount", now()->addHour(), function () {
            return $this->posts()->count();
        });
    }
}
