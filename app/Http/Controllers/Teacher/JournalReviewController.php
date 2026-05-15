<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Notifications\JournalApprovedNotification;
use App\Notifications\JournalRejectedNotification;
use Illuminate\Http\Request;

class JournalReviewController extends Controller
{
    public function index(Request $request)
    {
        $teacher = $request->user();

        // Get journals for the teacher's students that are pending
        $studentIds = $teacher->students()->pluck('id');

        $pendingJournals = Journal::whereIn('user_id', $studentIds)
            ->where('status', 'pending')
            ->with('user')
            ->orderBy('date', 'asc')
            ->paginate(15);

        return view('teacher.reviews', compact('pendingJournals'));
    }

    public function approve(Request $request, Journal $journal)
    {
        // Ensure journal belongs to one of the teacher's students
        $teacher = $request->user();
        if ($journal->user->teacher_id !== $teacher->id) {
            abort(403);
        }

        $journal->update([
            'status' => 'approved',
            'teacher_notes' => null,
        ]);

        $journal->user->notify(new JournalApprovedNotification($journal));

        return back()->with('success', 'Jurnal berhasil disetujui.');
    }

    public function reject(Request $request, Journal $journal)
    {
        $request->validate([
            'teacher_notes' => 'required|string|max:1000',
        ]);

        $teacher = $request->user();
        if ($journal->user->teacher_id !== $teacher->id) {
            abort(403);
        }

        $journal->update([
            'status' => 'rejected',
            'teacher_notes' => $request->teacher_notes,
        ]);

        $journal->user->notify(new JournalRejectedNotification($journal));

        return back()->with('success', 'Jurnal dikembalikan ke siswa dengan catatan.');
    }
}
