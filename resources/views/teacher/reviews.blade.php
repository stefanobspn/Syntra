@extends('layouts.teacher')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Review Jurnal Harian</h2>
        <p class="text-muted-foreground">Periksa dan setujui laporan aktivitas harian siswa bimbingan Anda.</p>
    </div>

    <div class="space-y-4">
        @forelse($pendingJournals as $journal)
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold">{{ strtoupper(substr($journal->user->name, 0, 1)) }}</div>
                        <div>
                            <h3 class="font-semibold text-foreground">{{ $journal->user->name }}</h3>
                            <p class="text-xs text-muted-foreground">{{ \Carbon\Carbon::parse($journal->date)->translatedFormat('l, d F Y') }}</p>
                        </div>
                    </div>
                    <div class="bg-muted/30 rounded-lg p-4 mb-4 border border-border/50">
                        <h4 class="font-medium text-sm text-foreground mb-1">Kegiatan:</h4>
                        <p class="text-sm text-muted-foreground mb-3">{{ $journal->activity }}</p>
                        
                        @if($journal->description)
                            <h4 class="font-medium text-sm text-foreground mb-1">Detail Tambahan:</h4>
                            <p class="text-sm text-muted-foreground">{{ $journal->description }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex md:flex-col gap-2">
                    <form action="{{ route('teacher.reviews.approve', $journal->id) }}" method="POST" class="flex-1 md:w-32">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors text-sm flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            Setujui
                        </button>
                    </form>
                    <button type="button" @click="$dispatch('open-modal', 'reject-journal-{{ $journal->id }}')" class="flex-1 md:w-32 px-4 py-2 bg-white border border-border text-red-600 font-medium rounded-lg hover:bg-red-50 transition-colors text-sm flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        Tolak
                    </button>
                </div>
            </div>

            <!-- Reject Modal -->
            <x-modal name="reject-journal-{{ $journal->id }}" maxWidth="sm">
                <form action="{{ route('teacher.reviews.reject', $journal->id) }}" method="POST">
                    @csrf
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-foreground mb-4">Tolak Jurnal</h3>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <label class="text-sm text-foreground">Alasan Penolakan / Catatan Perbaikan</label>
                                <textarea name="teacher_notes" required rows="3" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-red-500 resize-none" placeholder="Masukkan catatan untuk siswa..."></textarea>
                            </div>
                            <div class="flex justify-end gap-3 pt-4 border-t border-border">
                                <button type="button" @click="$dispatch('close')" class="px-4 py-2 rounded-lg border border-border bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">Tolak Jurnal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </x-modal>
        </div>
        @empty
        <div class="bg-white rounded-xl p-12 border border-border shadow-sm text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-muted-foreground mb-4 opacity-50"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            <h3 class="text-lg font-medium text-foreground mb-1">Semua Selesai!</h3>
            <p class="text-muted-foreground">Tidak ada jurnal pending yang perlu di-review saat ini.</p>
        </div>
        @endforelse

        @if($pendingJournals->hasPages())
        <div class="mt-6">
            {{ $pendingJournals->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</div>
@endsection
