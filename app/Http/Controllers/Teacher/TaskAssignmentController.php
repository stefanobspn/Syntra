<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Notifications\NewTaskAssignedNotification;
use Illuminate\Http\Request;

class TaskAssignmentController extends Controller
{
    public function index(Request $request)
    {
        $teacher = $request->user();
        $studentIds = $teacher->students()->pluck('id');

        $tasks = Task::whereIn('user_id', $studentIds)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $students = $teacher->students()->get();

        return view('teacher.assessments', compact('tasks', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today',
            'priority' => 'nullable|string|in:low,medium,high',
        ]);

        $teacher = $request->user();

        // Ensure the student belongs to this teacher
        $student = $teacher->students()->findOrFail($request->user_id);

        $task = Task::create([
            'user_id' => $student->id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority ?? 'medium',
            'status' => 'pending',
        ]);

        $student->notify(new NewTaskAssignedNotification($task));

        return back()->with('success', 'Tugas berhasil diberikan kepada siswa.');
    }
}
