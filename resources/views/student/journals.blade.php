@extends('layouts.student')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Jurnal Harian</h2>
            <p class="text-muted-foreground">Kelola dan catat aktivitas PKL harian Anda.</p>
        </div>
        <button class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah Jurnal
        </button>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-muted/50 text-muted-foreground border-b border-border">
                    <tr>
                        <th class="px-6 py-4 font-medium">Tanggal</th>
                        <th class="px-6 py-4 font-medium">Aktivitas</th>
                        <th class="px-6 py-4 font-medium">Jam Mulai</th>
                        <th class="px-6 py-4 font-medium">Jam Selesai</th>
                        <th class="px-6 py-4 font-medium text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4">15 Mei 2026</td>
                        <td class="px-6 py-4 font-medium text-foreground">Membuat dokumentasi API endpoints</td>
                        <td class="px-6 py-4">08:00</td>
                        <td class="px-6 py-4">16:00</td>
                        <td class="px-6 py-4 text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Disetujui
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4">14 Mei 2026</td>
                        <td class="px-6 py-4 font-medium text-foreground">Testing fitur authentication</td>
                        <td class="px-6 py-4">08:30</td>
                        <td class="px-6 py-4">17:00</td>
                        <td class="px-6 py-4 text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Menunggu
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4">13 Mei 2026</td>
                        <td class="px-6 py-4 font-medium text-foreground">Implementasi UI dashboard admin</td>
                        <td class="px-6 py-4">08:00</td>
                        <td class="px-6 py-4">16:30</td>
                        <td class="px-6 py-4 text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Disetujui
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-border flex items-center justify-between text-sm text-muted-foreground">
            <span>Menampilkan 3 dari 42 jurnal</span>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1 border border-border rounded-md hover:bg-muted/50 disabled:opacity-50" disabled>Sebelumnya</button>
                <button class="px-3 py-1 border border-border rounded-md hover:bg-muted/50">Selanjutnya</button>
            </div>
        </div>
    </div>
</div>
@endsection
