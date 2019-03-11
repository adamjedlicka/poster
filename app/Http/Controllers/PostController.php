<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => ['required', 'string'],
        ]);

        $post = Post::make($request->all());
        $post->user_id = Auth::user()->getKey();
        $post->save();

        Auth::user()->likes()->attach($post);

        Cache::increment("users.$post->user_id.postCount");

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        Cache::decrement("users.$post->user_id.postCount");

        return redirect()->back();
    }

    public function like(Post $post)
    {
        if (Auth::user()->likes($post)) {
            Auth::user()->likes()->detach($post);

            Cache::decrement("posts.$post->id.likeCount");
        } else {
            Auth::user()->likes()->attach($post);

            Cache::increment("posts.$post->id.likeCount");
        }

        return redirect()->back();
    }
}
