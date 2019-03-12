<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Topic;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function followUser(User $user)
    {
        if (Auth::user()->follows($user)) {
            Auth::user()->follows()->detach($user);

            Cache::decrement("users.$user->id.followerCount");
        } else {
            Auth::user()->follows()->attach($user);

            Cache::increment("users.$user->id.followerCount");
        }

        return redirect()->back();
    }

    public function followTopic(Topic $topic)
    {
        if (Auth::user()->followsTopic($topic)) {
            Auth::user()->followsTopic()->detach($topic);

            Cache::decrement("topics.$topic->id.followerCount");
        } else {
            Auth::user()->followsTopic()->attach($topic);

            Cache::increment("topics.$topic->id.followerCount");
        }

        return redirect()->back();
    }
}
