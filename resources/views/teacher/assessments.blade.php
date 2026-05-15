@extends('layouts.teacher')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Daftar Penugasan</h2>
            <p class="text-muted-foreground">Berikan dan pantau tugas khusus untuk siswa bimbingan Anda.</p>
        </div>
        <button @click="$dispatch('open-modal', 'add-task-global')" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Tugas Baru
        </button>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Tasks List -->
    <div class="bg-white border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-muted/50 text-muted-foreground border-b border-border">
                    <tr>
                        <th class="px-6 py-4 font-medium">Siswa</th>
                        <th class="px-6 py-4 font-medium">Judul Tugas</th>
                        <th class="px-6 py-4 font-medium">Tenggat Waktu</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($tasks as $task)
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">{{ strtoupper(substr($task->user->name, 0, 1)) }}</div>
                                <span class="font-medium text-foreground">{{ $task->user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-foreground">{{ $task->title }}</p>
                            @if($task->description)
                            <p class="text-xs text-muted-foreground line-clamp-1 mt-0.5">{{ $task->description }}</p>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-muted-foreground">
                            {{ \Carbon\Carbon::parse($task->due_date)->translatedFormat('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($task->status === 'completed')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Proses</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-muted-foreground">
                            <p>Belum ada tugas yang diberikan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($tasks->hasPages())
        <div class="px-6 py-4 border-t border-border">
            {{ $tasks->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</div>

<!-- Global Add Task Modal -->
<x-modal name="add-task-global" maxWidth="md">
    <form action="{{ route('teacher.assessments.store') }}" method="POST">
        @csrf
        <div class="bg-white p-8 relative">
            <button type="button" @click="$dispatch('close')" class="absolute right-6 top-6 text-muted-foreground hover:text-foreground bg-muted/50 hover:bg-muted rounded-full p-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>

            <div class="mb-6 text-center">
                <h3 class="text-xl font-bold text-foreground mb-1">Berikan Tugas Baru</h3>
                <p class="text-muted-foreground text-sm">Pilih siswa dan berikan penugasan.</p>
            </div>

            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Pilih Siswa</label>
                    <select name="user_id" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Siswa Bimbingan --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

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
                        Simpan Penugasan
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-modal>
@endsection
