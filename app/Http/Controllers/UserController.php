<?php

namespace App\Http\Controllers;

use App\User;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.detail', [
            'user' => $user,
            'posts' => $user->posts,
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);

        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
        ]);

        if ($request->has('avatar')) {
            $user->avatar_path = $request->file('avatar')->store('avatars');
        }

        $user->update($request->all());


        return redirect()->route('users.show', $user);
    }
}
