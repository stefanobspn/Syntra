@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Dashboard Admin</h2>
        <p class="text-muted-foreground">Overview sistem monitoring PKL</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">{{ $totalStudents }}</p>
                    <p class="text-sm text-muted-foreground">Total Siswa PKL</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">{{ $totalTeachers }}</p>
                    <p class="text-sm text-muted-foreground">Guru Pembimbing</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">0</p>
                    <p class="text-sm text-muted-foreground">Perusahaan Mitra</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">0%</p>
                    <p class="text-sm text-muted-foreground">Avg Completion</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl p-6 border border-border shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-foreground">Aktivitas Jurnal Terbaru</h3>
                <a href="{{ route('admin.reports') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                @forelse($recentActivities as $activity)
                <div class="flex items-center gap-4 p-3 rounded-lg bg-muted/30">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-semibold text-sm">{{ strtoupper(substr($activity->user->name, 0, 1)) }}</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-foreground">{{ $activity->user->name }}</p>
                        <p class="text-sm text-muted-foreground">Submit jurnal: {{ $activity->activity }}</p>
                    </div>
                    <span class="text-xs text-muted-foreground">{{ $activity->created_at->diffForHumans() }}</span>
                </div>
                @empty
                <div class="text-center py-4 text-sm text-muted-foreground">Belum ada aktivitas jurnal terbaru.</div>
                @endforelse
            </div>
        </div>

        <!-- Top Companies -->
        <div class="bg-white rounded-2xl p-6 border border-border shadow-sm">
            <h3 class="text-xl font-semibold text-foreground mb-6">Perusahaan Mitra Teratas</h3>
            <div class="space-y-4">
                @forelse($topCompanies as $company)
                <div class="flex items-center justify-between p-4 rounded-lg bg-muted/30">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                        </div>
                        <div>
                            <p class="font-medium text-foreground">{{ $company->name }}</p>
                            <p class="text-sm text-muted-foreground">{{ $company->students_count }} siswa aktif</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-foreground">{{ $company->quota }}</p>
                        <p class="text-xs text-muted-foreground">Kuota</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-6 text-sm text-muted-foreground">Belum ada data perusahaan mitra.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
