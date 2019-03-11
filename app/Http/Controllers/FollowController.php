<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function follow(User $user)
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
}
