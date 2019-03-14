<?php

namespace App;

use App\Scopes\SortScope;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'text',
        'html',
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function getLikeCountAttribute()
    {
        return Cache::remember("posts.$this->id.likeCount", now()->addHour(), function () {
            return $this->likes()->count();
        });
    }
}
