<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function follow(User $user)
    {
        if (Auth::user()->follows->find($user)) {
            Auth::user()->follows()->detach($user);
        } else {
            Auth::user()->follows()->attach($user);
        }

        return redirect()->back();
    }
}
