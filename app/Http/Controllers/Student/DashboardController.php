<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Calculate Hari PKL based on the first journal entry, or default to 0
        $firstJournal = $user->journals()->orderBy('date', 'asc')->first();
        $hariPkl = $firstJournal ? (int) now()->startOfDay()->diffInDays(Carbon::parse($firstJournal->date)->startOfDay()) + 1 : 0;

        // Static target duration (180 days ~ 6 months)
        $targetHari = 180;

        $jurnalTerisi = $user->journals()->count();
        $pendingReview = $user->journals()->where('status', 'pending')->count();

        // Calculate progress percentage
        $progress = $hariPkl > 0 ? min(round(($hariPkl / $targetHari) * 100), 100) : 0;

        $stats = [
            'hari_pkl' => $hariPkl,
            'jurnal_terisi' => $jurnalTerisi,
            'pending_review' => $pendingReview,
            'progress' => $progress,
        ];

        $recentJournals = $user->journals()->latest('date')->take(3)->get();

        return view('student.dashboard', compact('user', 'stats', 'recentJournals'));
    }
}
