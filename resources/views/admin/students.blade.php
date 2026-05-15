@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Data Siswa PKL</h2>
            <p class="text-muted-foreground">Kelola master data seluruh siswa PKL di sistem.</p>
        </div>
        <button class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah Siswa
        </button>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="p-4 border-b border-border flex items-center justify-between bg-muted/20">
            <div class="relative w-72">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input type="text" placeholder="Cari NISN atau Nama..." class="w-full pl-9 pr-4 py-2 text-sm border border-border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex gap-2">
                <button class="px-3 py-2 border border-border rounded-lg text-sm text-foreground hover:bg-muted font-medium flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="21" x2="14" y1="4" y2="4"/><line x1="10" x2="3" y1="4" y2="4"/><line x1="21" x2="12" y1="12" y2="12"/><line x1="8" x2="3" y1="12" y2="12"/><line x1="21" x2="16" y1="20" y2="20"/><line x1="12" x2="3" y1="20" y2="20"/><line x1="14" x2="14" y1="2" y2="6"/><line x1="8" x2="8" y1="10" y2="14"/><line x1="16" x2="16" y1="18" y2="22"/></svg>
                    Filter
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-muted/50 text-muted-foreground border-b border-border">
                    <tr>
                        <th class="px-6 py-4 font-medium">NISN</th>
                        <th class="px-6 py-4 font-medium">Nama Siswa</th>
                        <th class="px-6 py-4 font-medium">Jurusan</th>
                        <th class="px-6 py-4 font-medium">Penempatan PKL</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4 text-foreground">0051234567</td>
                        <td class="px-6 py-4 font-medium text-foreground">Ahmad Fauzi</td>
                        <td class="px-6 py-4 text-muted-foreground">Rekayasa Perangkat Lunak</td>
                        <td class="px-6 py-4 text-muted-foreground">PT Digital Solutions</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                            <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4 text-foreground">0051234568</td>
                        <td class="px-6 py-4 font-medium text-foreground">Siti Nurhaliza</td>
                        <td class="px-6 py-4 text-muted-foreground">Multimedia</td>
                        <td class="px-6 py-4 text-muted-foreground">CV Tech Innovate</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                            <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4 text-foreground">0051234569</td>
                        <td class="px-6 py-4 font-medium text-foreground">Budi Santoso</td>
                        <td class="px-6 py-4 text-muted-foreground">Teknik Komputer Jaringan</td>
                        <td class="px-6 py-4 text-muted-foreground">PT Maju Jaya</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                            <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-border flex items-center justify-between text-sm text-muted-foreground">
            <span>Menampilkan 1-10 dari 245 siswa</span>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1 border border-border rounded-md hover:bg-muted/50 disabled:opacity-50" disabled>Prev</button>
                <button class="px-3 py-1 border border-border rounded-md bg-blue-50 text-blue-600 font-medium">1</button>
                <button class="px-3 py-1 border border-border rounded-md hover:bg-muted/50">2</button>
                <button class="px-3 py-1 border border-border rounded-md hover:bg-muted/50">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
