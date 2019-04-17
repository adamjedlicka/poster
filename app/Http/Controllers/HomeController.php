<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'posts' => Post::paginate(10)->appends(Input::except('page')),
            'title' => 'All posts',
        ]);
    }
}
