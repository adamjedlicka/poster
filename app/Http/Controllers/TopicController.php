<?php

namespace App\Http\Controllers;

use App\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();

        return view('topics.index', [
            'topics' => $topics,
        ]);
    }

    public function show(Topic $topic)
    {
        return view('topics.show', [
            'topic' => $topic,
            'posts' => $topic->posts()->paginate(),
        ]);
    }
}
