@extends('layouts.teacher')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Daftar Siswa Bimbingan</h2>
            <p class="text-muted-foreground">Kelola dan pantau seluruh siswa PKL yang berada di bawah bimbingan Anda.</p>
        </div>
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input type="text" placeholder="Cari siswa..." class="pl-10 pr-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
        </div>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-muted/50 text-muted-foreground border-b border-border">
                    <tr>
                        <th class="px-6 py-4 font-medium">Nama Siswa</th>
                        <th class="px-6 py-4 font-medium">Email</th>
                        <th class="px-6 py-4 font-medium">Progress</th>
                        <th class="px-6 py-4 font-medium">Jurnal Pending</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($students as $student)
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                                <span class="font-medium text-foreground">{{ $student->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-muted-foreground">{{ $student->email }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-24 h-2 bg-muted rounded-full overflow-hidden">
                                    <div class="bg-blue-500 h-full" style="width: {{ $student->progress }}%"></div>
                                </div>
                                <span class="text-xs font-medium">{{ $student->progress }}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 {{ $student->pending_journals_count > 0 ? 'text-yellow-600' : 'text-muted-foreground' }} font-medium">{{ $student->pending_journals_count }} Jurnal</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('teacher.students.show', $student->id) }}" class="inline-block px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition-colors font-medium text-xs">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-muted-foreground">
                            <p>Belum ada data siswa bimbingan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($students->hasPages())
        <div class="px-6 py-4 border-t border-border">
            {{ $students->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</div>
@endsection
