<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $teacher = $request->user();

        $students = $teacher->students()->withCount([
            'journals',
            'journals as pending_journals_count' => function ($query) {
                $query->where('status', 'pending');
            },
            'tasks',
        ])->paginate(10);

        foreach ($students as $student) {
            $firstJournal = $student->journals()->orderBy('date', 'asc')->first();
            $hariPkl = $firstJournal ? (int) now()->startOfDay()->diffInDays(Carbon::parse($firstJournal->date)->startOfDay()) + 1 : 0;
            $student->progress = $hariPkl > 0 ? min(round(($hariPkl / 180) * 100), 100) : 0;
        }

        return view('teacher.students', compact('students'));
    }

    public function show(Request $request, $id)
    {
        $teacher = $request->user();
        $student = $teacher->students()->findOrFail($id);

        $journals = $student->journals()->orderBy('date', 'desc')->paginate(5, ['*'], 'journals_page');
        $tasks = $student->tasks()->orderBy('created_at', 'desc')->paginate(5, ['*'], 'tasks_page');

        $firstJournal = $student->journals()->orderBy('date', 'asc')->first();
        $hariPkl = $firstJournal ? (int) now()->startOfDay()->diffInDays(Carbon::parse($firstJournal->date)->startOfDay()) + 1 : 0;
        $progress = $hariPkl > 0 ? min(round(($hariPkl / 180) * 100), 100) : 0;

        return view('teacher.student_detail', compact('student', 'journals', 'tasks', 'hariPkl', 'progress'));
    }
}
