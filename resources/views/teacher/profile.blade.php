@extends('layouts.teacher')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Profil Saya</h2>
        <p class="text-muted-foreground">Kelola informasi pribadi dan data akun Anda.</p>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-32"></div>
        <div class="px-8 pb-8">
            <div class="relative flex justify-between items-end -mt-12 mb-6">
                <div class="w-24 h-24 bg-white rounded-full p-1 border-4 border-white shadow-sm flex items-center justify-center">
                    <div class="w-full h-full bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-3xl font-bold">
                        B
                    </div>
                </div>
                <button class="px-4 py-2 bg-white border border-border rounded-lg text-sm font-medium hover:bg-muted transition-colors shadow-sm">
                    Edit Profil
                </button>
            </div>

            <div>
                <h3 class="text-2xl font-bold text-foreground">Budi Santoso, S.Kom.</h3>
                <p class="text-muted-foreground">Guru Produktif RPL &bull; SMK Negeri 1 Jakarta</p>
            </div>

            <hr class="my-8 border-border">

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Personal Info -->
                <div class="space-y-6">
                    <h4 class="text-lg font-semibold text-foreground flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-muted-foreground"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Informasi Pribadi
                    </h4>
                    
                    <div>
                        <label class="text-sm text-muted-foreground block mb-1">Nama Lengkap</label>
                        <p class="font-medium text-foreground">Budi Santoso, S.Kom.</p>
                    </div>
                    
                    <div>
                        <label class="text-sm text-muted-foreground block mb-1">Email</label>
                        <p class="font-medium text-foreground">budi.santoso@smkn1jkt.sch.id</p>
                    </div>
                    
                    <div>
                        <label class="text-sm text-muted-foreground block mb-1">Nomor Telepon</label>
                        <p class="font-medium text-foreground">0812-9876-5432</p>
                    </div>
                </div>

                <!-- Academic Info -->
                <div class="space-y-6">
                    <h4 class="text-lg font-semibold text-foreground flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-muted-foreground"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        Informasi Kepegawaian
                    </h4>
                    
                    <div>
                        <label class="text-sm text-muted-foreground block mb-1">NIP</label>
                        <p class="font-medium text-foreground">198501012010011001</p>
                    </div>
                    
                    <div>
                        <label class="text-sm text-muted-foreground block mb-1">Jabatan</label>
                        <p class="font-medium text-foreground">Guru Muda</p>
                    </div>
                    
                    <div>
                        <label class="text-sm text-muted-foreground block mb-1">Program Keahlian</label>
                        <p class="font-medium text-foreground">Teknik Komputer dan Informatika</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
