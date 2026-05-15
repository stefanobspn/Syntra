@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-foreground mb-2">Data Perusahaan Mitra</h2>
            <p class="text-muted-foreground">Kelola daftar tempat industri / instansi mitra PKL.</p>
        </div>
        <button @click="$dispatch('open-modal', 'add-company')" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah Mitra
        </button>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($companies as $company)
        <div class="bg-white border border-border rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                </div>
                <div class="flex gap-1">
                    <button @click="$dispatch('open-modal', 'edit-company-{{ $company->id }}')" class="p-2 text-muted-foreground hover:text-blue-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg></button>
                    <button @click="$dispatch('open-modal', 'delete-company-{{ $company->id }}')" class="p-2 text-muted-foreground hover:text-red-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg></button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-foreground mb-1">{{ $company->name }}</h3>
            <p class="text-sm text-muted-foreground mb-4">{{ $company->industry ?? 'Belum ada bidang' }}</p>
            
            <div class="space-y-2 mb-6">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Kuota Tersedia</span>
                    <span class="font-medium">{{ $company->quota }} Siswa</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Siswa Aktif</span>
                    <span class="font-medium text-blue-600">{{ $company->students_count }} Siswa</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Rating Mitra</span>
                    <span class="font-medium text-yellow-500 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> {{ number_format($company->rating, 1) }}</span>
                </div>
            </div>

            <div class="pt-4 border-t border-border">
                <p class="text-xs text-muted-foreground flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    {{ $company->location ?? 'Lokasi belum diatur' }}
                </p>
            </div>
        </div>

        <!-- Edit Modal -->
        <x-modal name="edit-company-{{ $company->id }}" maxWidth="md">
            <form action="{{ route('admin.companies.update', $company->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="bg-white p-8 relative">
                    <button type="button" @click="$dispatch('close')" class="absolute right-6 top-6 text-muted-foreground hover:text-foreground bg-muted/50 hover:bg-muted rounded-full p-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                    <div class="mb-6 text-center">
                        <h3 class="text-xl font-bold text-foreground mb-1">Edit Perusahaan</h3>
                        <p class="text-muted-foreground text-sm">Ubah data perusahaan {{ $company->name }}</p>
                    </div>
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="text-sm text-foreground">Nama Perusahaan</label>
                            <input type="text" name="name" value="{{ $company->name }}" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-foreground">Bidang Usaha</label>
                            <input type="text" name="industry" value="{{ $company->industry }}" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-sm text-foreground">Kuota Siswa</label>
                                <input type="number" name="quota" value="{{ $company->quota }}" required min="0" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm text-foreground">Rating (0-5)</label>
                                <input type="number" step="0.1" name="rating" value="{{ $company->rating }}" required min="0" max="5" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-foreground">Lokasi</label>
                            <textarea name="location" rows="2" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $company->location }}</textarea>
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
        <x-modal name="delete-company-{{ $company->id }}" maxWidth="sm">
            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="p-6 text-center">
                    <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-2">Hapus Perusahaan</h3>
                    <p class="text-muted-foreground text-sm mb-6">Apakah Anda yakin ingin menghapus <strong>{{ $company->name }}</strong>? Siswa yang magang di sini akan kehilangan status penempatannya.</p>
                    <div class="flex gap-3">
                        <button type="button" @click="$dispatch('close')" class="flex-1 px-4 py-2 border border-border bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">Batal</button>
                        <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">Hapus Data</button>
                    </div>
                </div>  
            </form>
        </x-modal>

        @empty
        <div class="col-span-full py-12 text-center text-muted-foreground border-2 border-dashed border-border rounded-xl">
            Belum ada data perusahaan mitra.
        </div>
        @endforelse
    </div>
</div>

<!-- Add Modal -->
<x-modal name="add-company" maxWidth="md">
    <form action="{{ route('admin.companies.store') }}" method="POST">
        @csrf
        <div class="bg-white p-8 relative">
            <button type="button" @click="$dispatch('close')" class="absolute right-6 top-6 text-muted-foreground hover:text-foreground bg-muted/50 hover:bg-muted rounded-full p-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <div class="mb-6 text-center">
                <h3 class="text-xl font-bold text-foreground mb-1">Tambah Perusahaan</h3>
                <p class="text-muted-foreground text-sm">Masukkan data perusahaan mitra baru</p>
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
                    <label class="text-sm text-foreground">Nama Perusahaan</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Bidang Usaha</label>
                    <input type="text" name="industry" value="{{ old('industry') }}" placeholder="Contoh: Software House" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Kuota Siswa</label>
                    <input type="number" name="quota" value="{{ old('quota', 0) }}" required min="0" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="space-y-2">
                    <label class="text-sm text-foreground">Lokasi</label>
                    <textarea name="location" rows="2" class="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('location') }}</textarea>
                </div>
                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity font-medium shadow-sm">
                        Simpan Perusahaan
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-modal>
@endsection
