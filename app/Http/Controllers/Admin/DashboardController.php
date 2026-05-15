<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();

        $recentActivities = Journal::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('totalStudents', 'totalTeachers', 'recentActivities'));
    }
}
