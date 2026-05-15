<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications;

        return view('teacher.notifications', compact('notifications'));
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back()->with('success', 'Semua pemberitahuan telah ditandai sudah dibaca.');
    }
}
