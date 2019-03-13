<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'posts' => Post::orderBy('created_at', 'desc')
                ->with('user')
                ->paginate(),
        ]);
    }
}
