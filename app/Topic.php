<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'topic_followers');
    }

    public function getFollowerCountAttribute()
    {
        return Cache::rememberForever("topics.$this->id.followerCount", function () {
            return $this->followers()->count();
        });
    }
}
