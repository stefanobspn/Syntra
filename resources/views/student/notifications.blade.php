@extends('layouts.student')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Notifikasi</h2>
            <p class="text-muted-foreground">Pemberitahuan terkait aktivitas dan tugas PKL Anda.</p>
        </div>
        @if(auth()->user()->unreadNotifications->count() > 0)
        <form action="{{ route('student.notifications.mark_read') }}" method="POST">
            @csrf
            <button type="submit" class="text-sm text-blue-600 hover:underline font-medium">Tandai semua dibaca</button>
        </form>
        @endif
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($notifications as $notification)
        <div class="border rounded-xl p-5 flex gap-4 transition-colors {{ is_null($notification->read_at) ? 'bg-blue-50/50 border-blue-100 hover:bg-blue-50' : 'bg-white border-border hover:bg-muted/50' }}">
            <div class="mt-1">
                <div class="w-10 h-10 rounded-full flex items-center justify-center {{ is_null($notification->read_at) ? 'bg-blue-100' : 'bg-gray-100 opacity-70' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="{{ is_null($notification->read_at) ? 'text-blue-600' : 'text-gray-600' }}"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start mb-1">
                    <h4 class="font-semibold text-foreground {{ is_null($notification->read_at) ? '' : 'opacity-80' }}">{{ $notification->data['title'] ?? 'Notifikasi' }}</h4>
                    @if(is_null($notification->read_at))
                        <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">Baru</span>
                    @endif
                </div>
                <p class="text-sm text-muted-foreground mb-2">
                    {{ $notification->data['message'] ?? '' }}
                </p>
                <span class="text-xs text-muted-foreground flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    {{ $notification->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
        @empty
        <div class="bg-white border border-border rounded-xl p-8 text-center text-muted-foreground">
            Belum ada notifikasi saat ini.
        </div>
        @endforelse

    </div>
</div>
@endsection
