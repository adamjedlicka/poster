<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function readAll()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }
}
