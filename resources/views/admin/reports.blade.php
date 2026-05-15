@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Laporan & Rekapitulasi</h2>
        <p class="text-muted-foreground">Unduh laporan evaluasi, absensi, dan jurnal keseluruhan.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Report Card 1 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex items-start gap-4">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-foreground mb-1">Rekapitulasi Nilai Siswa</h3>
                <p class="text-sm text-muted-foreground mb-4">Export seluruh data nilai siswa dari guru pembimbing dan instruktur industri.</p>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 text-sm font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        Export Excel (.xlsx)
                    </button>
                    <button class="px-4 py-2 border border-border text-foreground rounded-lg hover:bg-muted text-sm font-medium flex items-center gap-2">
                        Export PDF
                    </button>
                </div>
            </div>
        </div>

        <!-- Report Card 2 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex items-start gap-4">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-foreground mb-1">Rekapitulasi Absensi</h3>
                <p class="text-sm text-muted-foreground mb-4">Laporan kehadiran harian seluruh siswa PKL secara komprehensif.</p>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 text-sm font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        Export Excel (.xlsx)
                    </button>
                    <button class="px-4 py-2 border border-border text-foreground rounded-lg hover:bg-muted text-sm font-medium flex items-center gap-2">
                        Export PDF
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
