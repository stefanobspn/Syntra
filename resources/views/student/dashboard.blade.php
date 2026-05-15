@extends('layouts.student')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Selamat Datang, Ahmad!</h2>
        <p class="text-muted-foreground">Pantau progress PKL Anda di sini</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 border border-border">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">45</p>
                    <p class="text-sm text-muted-foreground">Hari PKL</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">42</p>
                    <p class="text-sm text-muted-foreground">Jurnal Terisi</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-600"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">3</p>
                    <p class="text-sm text-muted-foreground">Pending Review</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 border border-border">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-foreground">93%</p>
                    <p class="text-sm text-muted-foreground">Progress</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Journals -->
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm">
        <h3 class="text-xl font-semibold text-foreground mb-6">Jurnal Terbaru</h3>
        <div class="space-y-4">
            
            <div class="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                    </div>
                    <div>
                        <p class="font-medium text-foreground">Membuat dokumentasi API endpoints</p>
                        <p class="text-sm text-muted-foreground">15 Mei 2026</p>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                    Disetujui
                </span>
            </div>

            <div class="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                    </div>
                    <div>
                        <p class="font-medium text-foreground">Testing fitur authentication</p>
                        <p class="text-sm text-muted-foreground">14 Mei 2026</p>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">
                    Pending
                </span>
            </div>

            <div class="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                    </div>
                    <div>
                        <p class="font-medium text-foreground">Implementasi UI dashboard admin</p>
                        <p class="text-sm text-muted-foreground">13 Mei 2026</p>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                    Disetujui
                </span>
            </div>

        </div>
    </div>
</div>
@endsection
