@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Data Siswa PKL</h2>
            <p class="text-muted-foreground">Kelola master data seluruh siswa PKL di sistem.</p>
        </div>
        <button @click="$dispatch('open-modal', 'add-student')" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah Siswa
        </button>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="p-4 border-b border-border flex items-center justify-between bg-muted/20">
            <form action="{{ route('admin.students') }}" method="GET" class="relative w-72">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama atau Email..." class="w-full pl-9 pr-4 py-2 text-sm border border-border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-muted/50 text-muted-foreground border-b border-border">
                    <tr>
                        <th class="px-6 py-4 font-medium">Nama Siswa</th>
                        <th class="px-6 py-4 font-medium">Email</th>
                        <th class="px-6 py-4 font-medium">Guru Pembimbing</th>
                        <th class="px-6 py-4 font-medium">Perusahaan Mitra</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($students as $student)
                    <tr class="hover:bg-muted/30 transition-colors">
                        <td class="px-6 py-4 font-medium text-foreground">{{ $student->name }}</td>
                        <td class="px-6 py-4 text-muted-foreground">{{ $student->email }}</td>
                        <td class="px-6 py-4 text-muted-foreground">{{ $student->teacher ? $student->teacher->name : '-' }}</td>
                        <td class="px-6 py-4 text-muted-foreground">{{ $student->company ? $student->company->name : '-' }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button @click="$dispatch('open-modal', 'edit-student-{{ $student->id }}')" class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                            <button @click="$dispatch('open-modal', 'delete-student-{{ $student->id }}')" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </td>
                    </tr>
                    
                    <!-- Edit Modal -->
                    <x-modal name="edit-student-{{ $student->id }}" maxWidth="md">
                        <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="bg-white p-8 relative">
                                <button type="button" @click="$dispatch('close')" class="absolute right-6 top-6 text-muted-foreground hover:text-foreground bg-muted/50 hover:bg-muted rounded-full p-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                                <div class="mb-6 text-center">
                                    <h3 class="text-xl font-bold text-foreground mb-1">Edit Siswa</h3>
                                    <p class="text-muted-foreground text-sm">Ubah data siswa {{ $student->name }}</p>
                                </div>
                                <div class="space-y-4">
                                    <div class="space-y-2">
                                        <label class="text-sm text-foreground">Nama Lengkap</label>
                                        <input type="text" name="name" value="{{ $student->name }}" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm text-foreground">Email</label>
                                        <input type="email" name="email" value="{{ $student->email }}" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="text-sm text-foreground">Guru Pembimbing</label>
                                            <select name="teacher_id" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <option value="">-- Tanpa Guru --</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" {{ $student->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="text-sm text-foreground">Perusahaan Mitra</label>
                                            <select name="company_id" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <option value="">-- Belum Ditempatkan --</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}" {{ $student->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm text-foreground">Password Baru (Opsional)</label>
                                        <input type="password" name="password" placeholder="Biarkan kosong jika tidak ingin mengubah" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="pt-4">
                                        <button type="submit" class="w-full flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity font-medium shadow-sm">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </x-modal>

                    <!-- Delete Modal -->
                    <x-modal name="delete-student-{{ $student->id }}" maxWidth="sm">
                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="p-6 text-center">
                                <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-foreground mb-2">Hapus Siswa</h3>
                                <p class="text-muted-foreground text-sm mb-6">Apakah Anda yakin ingin menghapus data siswa <strong>{{ $student->name }}</strong>? Tindakan ini tidak dapat dibatalkan.</p>
                                <div class="flex gap-3">
                                    <button type="button" @click="$dispatch('close')" class="flex-1 px-4 py-2 border border-border bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">Batal</button>
                                    <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">Hapus Data</button>
                                </div>
                            </div>
                        </form>
                    </x-modal>
                    
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-muted-foreground">Tidak ada data siswa ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($students->hasPages())
        <div class="px-6 py-4 border-t border-border">
            {{ $students->appends(request()->query())->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</div>

<!-- Add Modal -->
<x-modal name="add-student" maxWidth="md">
    <form action="{{ route('admin.students.store') }}" method="POST">
        @csrf
        <div class="bg-white p-8 relative">
            <button type="button" @click="$dispatch('close')" class="absolute right-6 top-6 text-muted-foreground hover:text-foreground bg-muted/50 hover:bg-muted rounded-full p-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <div class="mb-6 text-center">
                <h3 class="text-xl font-bold text-foreground mb-1">Tambah Siswa Baru</h3>
                <p class="text-muted-foreground text-sm">Masukkan data diri siswa PKL</p>
            </div>
            
            @if ($errors->any())
                <div class="mb-4 bg-red-50 text-red-600 p-3 rounded-lg text-sm border border-red-100">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm text-foreground">Guru Pembimbing</label>
                        <select name="teacher_id" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Tanpa Guru --</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm text-foreground">Perusahaan Mitra</label>
                        <select name="company_id" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Belum Ditempatkan --</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Password (Default)</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity font-medium shadow-sm">
                        Simpan Siswa
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-modal>
@endsection
