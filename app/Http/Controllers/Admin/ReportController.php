<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index()
    {
        $totalJournals = Journal::count();
        $totalStudents = User::where('role', 'student')->count();
        $approvedJournals = Journal::where('status', 'approved')->count();

        return view('admin.reports', compact('totalJournals', 'totalStudents', 'approvedJournals'));
    }

    public function exportJournals(): StreamedResponse
    {
        $journals = Journal::with(['user', 'user.teacher', 'user.company'])
            ->orderBy('date', 'desc')
            ->get();

        $filename = 'laporan_jurnal_'.now()->format('Y-m-d').'.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($journals) {
            $handle = fopen('php://output', 'w');

            // BOM for Excel UTF-8 compatibility
            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'No', 'Nama Siswa', 'Guru Pembimbing', 'Perusahaan Mitra',
                'Tanggal', 'Kegiatan', 'Deskripsi', 'Status',
            ]);

            foreach ($journals as $i => $journal) {
                fputcsv($handle, [
                    $i + 1,
                    $journal->user?->name ?? '-',
                    $journal->user?->teacher?->name ?? '-',
                    $journal->user?->company?->name ?? '-',
                    $journal->date,
                    $journal->activity,
                    $journal->description,
                    match ($journal->status) {
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                        default => 'Menunggu',
                    },
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportStudents(): StreamedResponse
    {
        $students = User::where('role', 'student')
            ->with(['teacher', 'company'])
            ->orderBy('name')
            ->get();

        $filename = 'laporan_siswa_'.now()->format('Y-m-d').'.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($students) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'No', 'Nama Siswa', 'Email', 'Guru Pembimbing', 'Perusahaan Mitra',
                'Total Jurnal', 'Jurnal Disetujui',
            ]);

            foreach ($students as $i => $student) {
                fputcsv($handle, [
                    $i + 1,
                    $student->name,
                    $student->email,
                    $student->teacher?->name ?? '-',
                    $student->company?->name ?? '-',
                    $student->journals()->count(),
                    $student->journals()->where('status', 'approved')->count(),
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
