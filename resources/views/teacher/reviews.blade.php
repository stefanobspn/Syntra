@extends('layouts.teacher')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Review Jurnal Harian</h2>
        <p class="text-muted-foreground">Periksa dan setujui laporan aktivitas harian siswa bimbingan Anda.</p>
    </div>

    <div class="space-y-4">
        <!-- Review Item 1 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold">A</div>
                        <div>
                            <h3 class="font-semibold text-foreground">Ahmad Fauzi</h3>
                            <p class="text-xs text-muted-foreground">15 Mei 2026 &bull; 08:00 - 16:00</p>
                        </div>
                    </div>
                    <div class="bg-muted/30 rounded-lg p-4 mb-4 border border-border/50">
                        <h4 class="font-medium text-sm text-foreground mb-1">Kegiatan:</h4>
                        <p class="text-sm text-muted-foreground mb-3">Membuat dokumentasi API endpoints menggunakan Swagger. Berkoordinasi dengan tim backend untuk memastikan semua parameter sesuai.</p>
                        
                        <h4 class="font-medium text-sm text-foreground mb-1">Catatan/Kendala:</h4>
                        <p class="text-sm text-muted-foreground">Tidak ada kendala berarti, namun butuh waktu untuk memahami arsitektur yang sudah ada.</p>
                    </div>
                </div>
                <div class="flex md:flex-col gap-2">
                    <button class="flex-1 md:w-32 px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors text-sm flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                        Setujui
                    </button>
                    <button class="flex-1 md:w-32 px-4 py-2 bg-white border border-border text-foreground font-medium rounded-lg hover:bg-muted transition-colors text-sm flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                        Revisi
                    </button>
                </div>
            </div>
        </div>

        <!-- Review Item 2 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center font-bold">S</div>
                        <div>
                            <h3 class="font-semibold text-foreground">Siti Nurhaliza</h3>
                            <p class="text-xs text-muted-foreground">15 Mei 2026 &bull; 09:00 - 17:00</p>
                        </div>
                    </div>
                    <div class="bg-muted/30 rounded-lg p-4 mb-4 border border-border/50">
                        <h4 class="font-medium text-sm text-foreground mb-1">Kegiatan:</h4>
                        <p class="text-sm text-muted-foreground mb-3">Mendesain UI/UX untuk fitur login dan register aplikasi internal.</p>
                        
                        <h4 class="font-medium text-sm text-foreground mb-1">Catatan/Kendala:</h4>
                        <p class="text-sm text-muted-foreground">Masih menunggu persetujuan warna brand dari tim marketing.</p>
                    </div>
                </div>
                <div class="flex md:flex-col gap-2">
                    <button class="flex-1 md:w-32 px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors text-sm flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                        Setujui
                    </button>
                    <button class="flex-1 md:w-32 px-4 py-2 bg-white border border-border text-foreground font-medium rounded-lg hover:bg-muted transition-colors text-sm flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                        Revisi
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
