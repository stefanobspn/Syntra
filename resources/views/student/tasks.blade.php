@extends('layouts.student')

@section('content')
<div class="max-w-7xl mx-auto" x-data="{ selectedTask: null }">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Tugas PKL</h2>
        <p class="text-muted-foreground">Daftar tugas yang diberikan oleh pembimbing industri Anda.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tasks as $task)
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm flex flex-col {{ $task->status === 'completed' ? 'opacity-70' : '' }}">
            <div class="flex justify-between items-start mb-4">
                @if($task->status === 'completed')
                    <div class="p-2 bg-green-100 text-green-600 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                @else
                    @if($task->priority === 'high')
                        <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Tinggi</span>
                    @elseif($task->priority === 'normal')
                        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Normal</span>
                    @else
                        <div class="p-2 bg-gray-100 text-gray-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Rendah</span>
                    @endif
                @endif
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-2">{{ $task->title }}</h3>
            <p class="text-sm text-muted-foreground mb-6 flex-1 line-clamp-3">
                {{ $task->description }}
            </p>
            <div class="flex items-center justify-between border-t border-border pt-4 mt-auto">
                <div class="text-sm text-muted-foreground flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    {{ $task->due_date ? 'Tenggat: ' . \Carbon\Carbon::parse($task->due_date)->translatedFormat('d M Y') : 'Tanpa tenggat' }}
                </div>
                <button @click="selectedTask = {{ json_encode($task) }}; $dispatch('open-modal', 'task-detail')" class="text-sm text-blue-600 font-medium hover:underline">Detail</button>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white border border-border rounded-xl p-8 text-center text-muted-foreground">
            Belum ada tugas yang diberikan oleh pembimbing industri.
        </div>
        @endforelse
    </div>

    <!-- Task Detail Modal -->
    <x-modal name="task-detail" maxWidth="lg">
        <div class="bg-white px-6 pt-6 pb-6">
            <div class="flex justify-between items-center mb-6 border-b border-border pb-4">
                <h3 class="text-xl font-bold text-foreground" id="modal-title" x-text="selectedTask ? selectedTask.title : 'Detail Tugas'"></h3>
                <button type="button" @click="$dispatch('close')" class="text-muted-foreground hover:text-foreground bg-muted hover:bg-muted/80 rounded-full p-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="space-y-6">
                <div>
                    <span class="text-xs font-bold text-muted-foreground uppercase tracking-wider block mb-2">Deskripsi Tugas</span>
                    <p class="text-sm text-foreground whitespace-pre-wrap bg-muted/30 p-4 rounded-xl border border-border" x-text="selectedTask ? selectedTask.description : ''"></p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                        <span class="text-xs font-bold text-blue-600/70 uppercase tracking-wider block mb-1">Prioritas</span>
                        <p class="text-sm font-semibold text-blue-900 capitalize" x-text="selectedTask ? selectedTask.priority : ''"></p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-border">
                        <span class="text-xs font-bold text-muted-foreground uppercase tracking-wider block mb-1">Status</span>
                        <p class="text-sm font-semibold text-foreground capitalize" x-text="selectedTask ? (selectedTask.status == 'completed' ? 'Selesai' : 'Pending') : ''"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-6 py-4 flex flex-row-reverse border-t border-border rounded-b-2xl">
            <button type="button" @click="$dispatch('close')" class="inline-flex justify-center rounded-lg border border-border shadow-sm px-5 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none transition-colors w-full sm:w-auto">
                Tutup Detail
            </button>
        </div>
    </x-modal>
</div>
@endsection
