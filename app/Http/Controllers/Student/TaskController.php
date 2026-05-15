<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->orderBy('due_date', 'asc')->get();

        return view('student.tasks', compact('tasks'));
    }
}
