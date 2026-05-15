@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Data Perusahaan Mitra</h2>
            <p class="text-muted-foreground">Kelola daftar tempat industri / instansi mitra PKL.</p>
        </div>
        <button class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah Mitra
        </button>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Company Card 1 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                </div>
                <div class="flex gap-1">
                    <button class="p-2 text-muted-foreground hover:text-blue-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg></button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-1">PT Digital Solutions</h3>
            <p class="text-sm text-muted-foreground mb-4">Software House & IT Consultant</p>
            
            <div class="space-y-2 mb-6">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Kuota Tersedia</span>
                    <span class="font-medium">10 Siswa</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Siswa Aktif</span>
                    <span class="font-medium text-blue-600">8 Siswa</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Rating Mitra</span>
                    <span class="font-medium text-yellow-500 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> 4.8</span>
                </div>
            </div>

            <div class="pt-4 border-t border-border">
                <p class="text-xs text-muted-foreground flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    Jakarta Selatan, DKI Jakarta
                </p>
            </div>
        </div>

        <!-- Company Card 2 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg>
                </div>
                <div class="flex gap-1">
                    <button class="p-2 text-muted-foreground hover:text-blue-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg></button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-1">CV Tech Innovate</h3>
            <p class="text-sm text-muted-foreground mb-4">Hardware & Network Solution</p>
            
            <div class="space-y-2 mb-6">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Kuota Tersedia</span>
                    <span class="font-medium">15 Siswa</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Siswa Aktif</span>
                    <span class="font-medium text-blue-600">12 Siswa</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Rating Mitra</span>
                    <span class="font-medium text-yellow-500 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> 4.7</span>
                </div>
            </div>

            <div class="pt-4 border-t border-border">
                <p class="text-xs text-muted-foreground flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    Bandung, Jawa Barat
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
