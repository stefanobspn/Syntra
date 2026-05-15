@extends('layouts.student')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Progress PKL</h2>
        <p class="text-muted-foreground">Pantau sejauh mana perkembangan dan kehadiran PKL Anda.</p>
    </div>

    <!-- Overall Progress -->
    <div class="bg-white rounded-xl border border-border p-8 mb-8 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-foreground">Progress Keseluruhan</h3>
            <span class="text-2xl font-bold text-blue-600">75%</span>
        </div>
        <div class="w-full bg-muted rounded-full h-4 mb-4">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-4 rounded-full" style="width: 75%"></div>
        </div>
        <p class="text-sm text-muted-foreground">Anda telah menyelesaikan 45 hari dari total 60 hari masa PKL.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Attendance Stats -->
        <div class="bg-white rounded-xl border border-border p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-foreground mb-6">Statistik Kehadiran</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="text-foreground font-medium">Hadir</span>
                    </div>
                    <span class="font-bold text-foreground">42 Hari</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <span class="text-foreground font-medium">Izin / Sakit</span>
                    </div>
                    <span class="font-bold text-foreground">3 Hari</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <span class="text-foreground font-medium">Alpha</span>
                    </div>
                    <span class="font-bold text-foreground">0 Hari</span>
                </div>
            </div>
        </div>

        <!-- Evaluation / Grades -->
        <div class="bg-white rounded-xl border border-border p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-foreground mb-6">Nilai & Evaluasi Sementara</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium">Keterampilan Teknis</span>
                        <span class="font-bold text-blue-600">88/100</span>
                    </div>
                    <div class="w-full bg-muted rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 88%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium">Kedisiplinan</span>
                        <span class="font-bold text-green-600">95/100</span>
                    </div>
                    <div class="w-full bg-muted rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 95%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium">Kerja Sama Tim</span>
                        <span class="font-bold text-indigo-600">90/100</span>
                    </div>
                    <div class="w-full bg-muted rounded-full h-2">
                        <div class="bg-indigo-500 h-2 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
