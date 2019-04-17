<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

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

        $post = Post::create($request->all());

        Cache::increment("users.$post->user_id.postCount");

        return redirect()->back()
            ->with('message', [
                'title' => 'Success',
                'text' => 'New post created successfully',
            ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        Cache::decrement("users.$post->user_id.postCount");

        Session::flash('message', [
            'title' => 'Success',
            'text' => 'Post deleted successfully',
        ]);

        return response(200);
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

        return response(200);
    }
}
