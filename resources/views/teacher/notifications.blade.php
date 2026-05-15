@extends('layouts.teacher')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Notifikasi</h2>
            <p class="text-muted-foreground">Pemberitahuan aktivitas siswa bimbingan Anda.</p>
        </div>
        <button class="text-sm text-blue-600 hover:underline font-medium">Tandai semua dibaca</button>
    </div>

    <div class="space-y-4">
        <!-- Notification Item 1 (Unread) -->
        <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-5 flex gap-4 transition-colors hover:bg-blue-50">
            <div class="mt-1">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start mb-1">
                    <h4 class="font-semibold text-foreground">Jurnal Baru Disubmit</h4>
                    <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">Baru</span>
                </div>
                <p class="text-sm text-muted-foreground mb-2">
                    <span class="font-medium text-foreground">Ahmad Fauzi</span> telah mengumpulkan jurnal harian untuk tanggal 15 Mei 2026. Menunggu review Anda.
                </p>
                <span class="text-xs text-muted-foreground flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    2 jam yang lalu
                </span>
            </div>
        </div>

        <!-- Notification Item 2 (Read) -->
        <div class="bg-white border border-border rounded-xl p-5 flex gap-4 transition-colors hover:bg-muted/50">
            <div class="mt-1">
                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center opacity-70">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start mb-1">
                    <h4 class="font-medium text-foreground opacity-80">Laporan Absensi Mingguan</h4>
                </div>
                <p class="text-sm text-muted-foreground mb-2">
                    Laporan absensi mingguan untuk seluruh siswa bimbingan Anda telah tersedia.
                </p>
                <span class="text-xs text-muted-foreground flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Kemarin
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
