@extends('layouts.teacher')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Dashboard Pembimbing</h2>
        <p class="text-muted-foreground">Pantau dan bimbing siswa PKL Anda</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">24</p>
                    <p class="text-sm text-muted-foreground">Total Siswa</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-600"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">12</p>
                    <p class="text-sm text-muted-foreground">Perlu Review</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">156</p>
                    <p class="text-sm text-muted-foreground">Jurnal Disetujui</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">89%</p>
                    <p class="text-sm text-muted-foreground">Rata-rata Progress</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Students List -->
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-foreground">Daftar Siswa Bimbingan Terkini</h3>
            <a href="{{ route('teacher.students') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
        </div>
        <div class="space-y-3">
            
            <div class="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">A</span>
                    </div>
                    <div>
                        <p class="font-medium text-foreground">Ahmad Fauzi</p>
                        <p class="text-sm text-muted-foreground">PT Digital Solutions</p>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm text-muted-foreground">Progress</p>
                        <p class="font-semibold text-foreground">93%</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <p class="text-sm text-muted-foreground">Pending</p>
                        <p class="font-semibold text-yellow-600">3</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-50 text-blue-600 font-medium rounded-lg hover:bg-blue-100 transition-colors text-sm">
                        Review
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">S</span>
                    </div>
                    <div>
                        <p class="font-medium text-foreground">Siti Nurhaliza</p>
                        <p class="text-sm text-muted-foreground">CV Tech Innovate</p>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm text-muted-foreground">Progress</p>
                        <p class="font-semibold text-foreground">87%</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <p class="text-sm text-muted-foreground">Pending</p>
                        <p class="font-semibold text-yellow-600">5</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-50 text-blue-600 font-medium rounded-lg hover:bg-blue-100 transition-colors text-sm">
                        Review
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">B</span>
                    </div>
                    <div>
                        <p class="font-medium text-foreground">Budi Santoso</p>
                        <p class="text-sm text-muted-foreground">PT Maju Jaya</p>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm text-muted-foreground">Progress</p>
                        <p class="font-semibold text-foreground">76%</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <p class="text-sm text-muted-foreground">Pending</p>
                        <p class="font-semibold text-yellow-600">2</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-50 text-blue-600 font-medium rounded-lg hover:bg-blue-100 transition-colors text-sm">
                        Review
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
