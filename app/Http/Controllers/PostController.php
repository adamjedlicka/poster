<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $post->likes()->attach(Auth::user());

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->back();
    }

    public function like(Post $post)
    {
        if ($post->isLikedBy(Auth::id())) {
            $post->likes()->detach(Auth::user());
        } else {
            $post->likes()->attach(Auth::user());
        }

        return redirect()->back();
    }
}
