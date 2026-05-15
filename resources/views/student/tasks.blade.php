@extends('layouts.student')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Tugas PKL</h2>
        <p class="text-muted-foreground">Daftar tugas yang diberikan oleh pembimbing industri Anda.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Task Card 1 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    High Priority
                </span>
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-2">Perbaiki Bug Login Page</h3>
            <p class="text-sm text-muted-foreground mb-6 flex-1">
                Terdapat isu di mana pengguna tidak bisa login menggunakan email dengan domain tertentu. Harap segera dicek dan diperbaiki.
            </p>
            <div class="flex items-center justify-between border-t border-border pt-4 mt-auto">
                <div class="text-sm text-muted-foreground flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    Tenggat: 16 Mei 2026
                </div>
                <button class="text-sm text-blue-600 font-medium hover:underline">Detail</button>
            </div>
        </div>

        <!-- Task Card 2 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    In Progress
                </span>
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-2">Desain Halaman Profil</h3>
            <p class="text-sm text-muted-foreground mb-6 flex-1">
                Buatlah mockup desain untuk halaman profil pengguna mengikuti pedoman UI perusahaan.
            </p>
            <div class="flex items-center justify-between border-t border-border pt-4 mt-auto">
                <div class="text-sm text-muted-foreground flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    Tenggat: 20 Mei 2026
                </div>
                <button class="text-sm text-blue-600 font-medium hover:underline">Detail</button>
            </div>
        </div>

        <!-- Task Card 3 -->
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex flex-col opacity-70">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-green-100 text-green-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Selesai
                </span>
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-2">Setup Database Staging</h3>
            <p class="text-sm text-muted-foreground mb-6 flex-1">
                Konfigurasi environment database untuk keperluan testing staging.
            </p>
            <div class="flex items-center justify-between border-t border-border pt-4 mt-auto">
                <div class="text-sm text-muted-foreground flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 7 7 9-14"/></svg>
                    Diselesaikan: 12 Mei 2026
                </div>
                <button class="text-sm text-blue-600 font-medium hover:underline">Lihat</button>
            </div>
        </div>
    </div>
</div>
@endsection
