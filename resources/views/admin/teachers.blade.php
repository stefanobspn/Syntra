@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Data Guru Pembimbing</h2>
            <p class="text-muted-foreground">Kelola master data seluruh guru pembimbing di sistem.</p>
        </div>
        <button class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah Guru
        </button>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="p-4 border-b border-border flex items-center justify-between bg-muted/20">
            <div class="relative w-72">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input type="text" placeholder="Cari NIP atau Nama..." class="w-full pl-9 pr-4 py-2 text-sm border border-border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-muted/50 text-muted-foreground border-b border-border">
                    <tr>
                        <th class="px-6 py-4 font-medium">NIP</th>
                        <th class="px-6 py-4 font-medium">Nama Guru</th>
                        <th class="px-6 py-4 font-medium">Program Keahlian</th>
                        <th class="px-6 py-4 font-medium">Jumlah Bimbingan</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4 text-foreground">198501012010011001</td>
                        <td class="px-6 py-4 font-medium text-foreground">Budi Santoso, S.Kom.</td>
                        <td class="px-6 py-4 text-muted-foreground">Teknik Komputer dan Informatika</td>
                        <td class="px-6 py-4 text-foreground"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-lg font-medium">24 Siswa</span></td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                            <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4 text-foreground">198203042009022002</td>
                        <td class="px-6 py-4 font-medium text-foreground">Ratna Sari, M.Pd.</td>
                        <td class="px-6 py-4 text-muted-foreground">Seni dan Ekonomi Kreatif</td>
                        <td class="px-6 py-4 text-foreground"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-lg font-medium">18 Siswa</span></td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                            <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
