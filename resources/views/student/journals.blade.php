@extends('layouts.student')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Jurnal Harian</h2>
            <p class="text-muted-foreground">Kelola dan catat aktivitas PKL harian Anda.</p>
        </div>
        <button x-data="" @click.prevent="$dispatch('open-modal', 'add-journal')" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah Jurnal
        </button>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if($journals->isEmpty())
    <div class="shadow-sm p-16 flex flex-col items-center justify-center text-center">
        <h3 class="text-xl font-bold text-foreground mb-2">Belum Ada Jurnal</h3>
        <p class="text-sm text-muted-foreground max-w-sm mb-6">Anda belum memiliki catatan kegiatan harian. Mulai dokumentasikan aktivitas PKL Anda untuk hari ini.</p>
      
    </div>
    @else
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
                    @foreach($journals as $journal)
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($journal->date)->translatedFormat('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-foreground">{{ $journal->activity }}</div>
                            @if($journal->description)
                                <div class="text-xs text-muted-foreground mt-1 line-clamp-1" title="{{ $journal->description }}">{{ $journal->description }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">-</td>
                        <td class="px-6 py-4">-</td>
                        <td class="px-6 py-4 text-right">
                            @if($journal->status === 'approved')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                            @elseif($journal->status === 'pending')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($journals->hasPages())
        <div class="px-6 py-4 border-t border-border">
            {{ $journals->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
    @endif

    <!-- Add Journal Modal -->
    <x-modal name="add-journal" maxWidth="md">
        <form action="{{ route('student.journals.store') }}" method="POST">
            @csrf
            <div class="bg-white p-8 relative">
                <!-- Close Button -->
                <button type="button" @click="$dispatch('close')" class="absolute right-6 top-6 text-muted-foreground hover:text-foreground bg-muted/50 hover:bg-muted rounded-full p-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>

                <!-- Header -->
                <div class="mb-8 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-foreground mb-2" id="modal-title">Tambah Jurnal Harian</h3>
                    <p class="text-muted-foreground text-sm">Dokumentasikan aktivitas PKL Anda hari ini</p>
                </div>

                <div class="space-y-6">
                    <!-- Tanggal -->
                    <div class="space-y-2">
                        <label class="text-sm text-foreground">Tanggal</label>
                        <div class="relative">
                            <input type="date" name="date" required value="{{ date('Y-m-d') }}" onclick="this.showPicker()" class="w-full pl-4 pr-10 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute right-4 top-1/2 -translate-y-1/2 text-muted-foreground pointer-events-none"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        </div>
                    </div>
                    
                    <!-- Judul Aktivitas -->
                    <div class="space-y-2">
                        <label class="text-sm text-foreground">Judul Aktivitas</label>
                        <input type="text" name="activity" required placeholder="Contoh: Membuat dokumentasi API" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Jam Mulai -->
                        <div class="space-y-2">
                            <label class="text-sm text-foreground">Jam Mulai</label>
                            <div class="relative">
                                <input type="time" name="start_time" required onclick="this.showPicker()" class="w-full pl-4 pr-10 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute right-4 top-1/2 -translate-y-1/2 text-muted-foreground pointer-events-none"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                        </div>
                        
                        <!-- Jam Selesai -->
                        <div class="space-y-2">
                            <label class="text-sm text-foreground">Jam Selesai</label>
                            <div class="relative">
                                <input type="time" name="end_time" required onclick="this.showPicker()" class="w-full pl-4 pr-10 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute right-4 top-1/2 -translate-y-1/2 text-muted-foreground pointer-events-none"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Catatan -->
                    <div class="space-y-2">
                        <label class="text-sm text-foreground">Catatan Tambahan</label>
                        <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Jelaskan detail yang dikerjakan..."></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="pt-4 space-y-3">
                        <button type="submit" class="w-full flex justify-center items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity font-medium shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                            Simpan Jurnal Harian
                        </button>
                        <button type="button" @click="$dispatch('close')" class="w-full flex justify-center items-center px-6 py-3 rounded-lg border border-transparent bg-transparent text-muted-foreground hover:text-foreground hover:bg-muted/50 font-medium transition-colors">
                            Batalkan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-modal>
</div>
@endsection
