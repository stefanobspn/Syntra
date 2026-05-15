@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Laporan & Rekapitulasi</h2>
        <p class="text-muted-foreground">Unduh laporan jurnal dan data siswa dalam format CSV yang bisa dibuka di Excel.</p>
    </div>

    <!-- Summary Stats -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">{{ $totalStudents }}</p>
                    <p class="text-sm text-muted-foreground">Total Siswa</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">{{ $totalJournals }}</p>
                    <p class="text-sm text-muted-foreground">Total Entri Jurnal</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">{{ $approvedJournals }}</p>
                    <p class="text-sm text-muted-foreground">Jurnal Disetujui</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Cards -->
    <div class="grid md:grid-cols-2 gap-6">
        <!-- Journals Report -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex items-start gap-4">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-foreground mb-1">Laporan Jurnal Siswa</h3>
                <p class="text-sm text-muted-foreground mb-1">Seluruh entri jurnal harian dari semua siswa, termasuk status persetujuan guru.</p>
                <p class="text-xs text-muted-foreground mb-4">Kolom: Nama Siswa, Guru, Perusahaan, Tanggal, Kegiatan, Deskripsi, Status</p>
                <a href="{{ route('admin.reports.export.journals') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                    Unduh CSV Jurnal
                </a>
            </div>
        </div>

        <!-- Students Report -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex items-start gap-4">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-foreground mb-1">Rekapitulasi Data Siswa</h3>
                <p class="text-sm text-muted-foreground mb-1">Daftar lengkap seluruh siswa PKL beserta rekap total jurnal yang telah disubmit.</p>
                <p class="text-xs text-muted-foreground mb-4">Kolom: Nama, Email, Guru Pembimbing, Perusahaan, Total Jurnal, Jurnal Disetujui</p>
                <a href="{{ route('admin.reports.export.students') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                    Unduh CSV Siswa
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
