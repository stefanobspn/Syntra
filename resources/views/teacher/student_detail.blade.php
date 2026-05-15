@extends('layouts.teacher')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header with Back Button -->
    <div class="mb-8">
        <a href="{{ route('teacher.students') }}" class="inline-flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground mb-4 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali ke Daftar Siswa
        </a>
        <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold shadow-sm">
                    {{ strtoupper(substr($student->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-foreground mb-1">{{ $student->name }}</h2>
                    <p class="text-muted-foreground">{{ $student->email }}</p>
                </div>
            </div>
            
            <div class="text-right bg-white px-6 py-4 rounded-xl border border-border shadow-sm">
                <p class="text-sm text-muted-foreground mb-1">Progress PKL ({{ $hariPkl }} Hari)</p>
                <div class="flex items-center gap-3">
                    <div class="w-32 h-2.5 bg-muted rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full rounded-full" style="width: {{ $progress }}%"></div>
                    </div>
                    <span class="font-bold text-foreground">{{ $progress }}%</span>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabs/Sections Layout -->
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Left Column: Journals (2/3 width) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-border shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-foreground">Jurnal Harian Siswa</h3>
                </div>

                <div class="space-y-4">
                    @forelse($journals as $journal)
                        <div class="p-5 border border-border rounded-xl hover:border-blue-200 hover:shadow-sm transition-all bg-white group">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h4 class="font-bold text-foreground group-hover:text-blue-600 transition-colors">{{ $journal->activity }}</h4>
                                    <p class="text-sm text-muted-foreground">{{ \Carbon\Carbon::parse($journal->date)->translatedFormat('l, d F Y') }}</p>
                                </div>
                                @if($journal->status === 'approved')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                                @elseif($journal->status === 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                                @endif
                            </div>
                            
                            @if($journal->description)
                                <p class="text-foreground text-sm leading-relaxed mb-4">{{ $journal->description }}</p>
                            @endif

                            @if($journal->teacher_notes)
                                <div class="bg-muted/50 rounded-lg p-3 mt-3 border-l-2 border-blue-500">
                                    <p class="text-xs font-semibold text-blue-700 mb-1">Catatan Pembimbing:</p>
                                    <p class="text-sm text-foreground">{{ $journal->teacher_notes }}</p>
                                </div>
                            @endif

                            @if($journal->status === 'pending')
                                <div class="mt-4 pt-4 border-t border-border flex gap-2">
                                    <form action="{{ route('teacher.reviews.approve', $journal->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-green-50 text-green-700 rounded-lg text-sm font-medium hover:bg-green-100 transition-colors">Setujui</button>
                                    </form>
                                    <button @click="$dispatch('open-modal', 'reject-journal-{{ $journal->id }}')" class="px-4 py-2 bg-red-50 text-red-700 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors">Tolak dengan Catatan</button>
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
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-8 bg-muted/20 rounded-xl border border-dashed border-border">
                            <p class="text-muted-foreground text-sm">Belum ada jurnal yang disubmit.</p>
                        </div>
                    @endforelse

                    @if($journals->hasPages())
                        <div class="mt-4">
                            {{ $journals->links('pagination::tailwind') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column: Tasks (1/3 width) -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-border shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-foreground">Tugas Terkini</h3>
                    <button class="text-sm bg-blue-50 text-blue-600 px-3 py-1.5 rounded-lg font-medium hover:bg-blue-100 transition-colors" @click="$dispatch('open-modal', 'add-task')">
                        + Beri Tugas
                    </button>
                </div>

                <div class="space-y-4">
                    @forelse($tasks as $task)
                        <div class="p-4 border border-border rounded-xl">
                            <h4 class="font-semibold text-foreground text-sm mb-1">{{ $task->title }}</h4>
                            <p class="text-xs text-muted-foreground mb-3 line-clamp-2">{{ $task->description }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] uppercase font-bold text-muted-foreground bg-muted px-2 py-1 rounded">DUE: {{ \Carbon\Carbon::parse($task->due_date)->format('d M') }}</span>
                                @if($task->status === 'completed')
                                    <span class="text-[10px] uppercase font-bold text-green-700 bg-green-50 px-2 py-1 rounded">Selesai</span>
                                @else
                                    <span class="text-[10px] uppercase font-bold text-yellow-700 bg-yellow-50 px-2 py-1 rounded">Proses</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <p class="text-muted-foreground text-xs">Belum ada tugas diberikan.</p>
                        </div>
                    @endforelse

                    @if($tasks->hasPages())
                        <div class="mt-2 text-xs">
                            {{ $tasks->links('pagination::tailwind') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Task Modal -->
<x-modal name="add-task" maxWidth="sm">
    <form action="{{ route('teacher.assessments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $student->id }}">
        
        <div class="bg-white p-8 relative">
            <button type="button" @click="$dispatch('close')" class="absolute right-6 top-6 text-muted-foreground hover:text-foreground bg-muted/50 hover:bg-muted rounded-full p-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>

            <div class="mb-6 text-center">
                <h3 class="text-xl font-bold text-foreground mb-1">Berikan Tugas Baru</h3>
                <p class="text-muted-foreground text-sm">Untuk {{ $student->name }}</p>
            </div>

            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Judul Tugas</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm text-foreground">Prioritas</label>
                        <select name="priority" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="low">Rendah</option>
                            <option value="medium" selected>Sedang</option>
                            <option value="high">Tinggi</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm text-foreground">Tenggat Waktu</label>
                        <input type="date" name="due_date" required min="{{ date('Y-m-d') }}" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer" onclick="this.showPicker()">
                    </div>
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Deskripsi Tugas</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Detail tugas..."></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity font-medium shadow-sm">
                        Kirim Tugas
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-modal>
@endsection
