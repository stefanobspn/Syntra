<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Auth::user()->journals()->orderBy('date', 'desc')->paginate(10);

        return view('student.journals', compact('journals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'activity' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'description' => 'nullable|string',
        ]);

        // Merge start_time and end_time into description for now as our schema doesn't have time columns
        $description = "Mulai: {$validated['start_time']}, Selesai: {$validated['end_time']}. ".($validated['description'] ?? '');

        Auth::user()->journals()->create([
            'activity' => $validated['activity'],
            'description' => $description,
            'date' => $validated['date'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Jurnal berhasil ditambahkan.');
    }
}
