<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $teacher = $request->user();

        $students = $teacher->students()->withCount(['journals as pending_journals_count' => function ($query) {
            $query->where('status', 'pending');
        }])->get();

        $totalStudents = $students->count();

        // Use whereIn instead of whereHas to count journals efficiently
        $studentIds = $students->pluck('id');
        $pendingReviews = Journal::whereIn('user_id', $studentIds)->where('status', 'pending')->count();
        $approvedJournals = Journal::whereIn('user_id', $studentIds)->where('status', 'approved')->count();

        // Calculate average progress
        $totalProgress = 0;
        foreach ($students as $student) {
            $firstJournal = $student->journals()->orderBy('date', 'asc')->first();
            $hariPkl = $firstJournal ? (int) now()->startOfDay()->diffInDays(Carbon::parse($firstJournal->date)->startOfDay()) + 1 : 0;
            $progress = $hariPkl > 0 ? min(round(($hariPkl / 180) * 100), 100) : 0;
            $totalProgress += $progress;
            $student->progress = $progress;
        }
        $averageProgress = $totalStudents > 0 ? round($totalProgress / $totalStudents) : 0;

        $stats = [
            'total_students' => $totalStudents,
            'pending_reviews' => $pendingReviews,
            'approved_journals' => $approvedJournals,
            'average_progress' => $averageProgress,
        ];

        // Sort students by pending journals to show top 3 needing attention
        $recentStudents = $students->sortByDesc('pending_journals_count')->take(3);

        return view('teacher.dashboard', compact('stats', 'recentStudents'));
    }
}
