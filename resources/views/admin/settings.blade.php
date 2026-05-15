@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Pengaturan Sistem</h2>
        <p class="text-muted-foreground">Konfigurasi variabel global dan pengaturan periode PKL.</p>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm p-6 mb-6">
        <h3 class="text-lg font-semibold text-foreground border-b border-border pb-4 mb-6">Tahun Ajaran & Periode PKL</h3>
        
        <form class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Tahun Ajaran Aktif</label>
                    <select class="w-full border border-border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option>2025/2026</option>
                        <option selected>2026/2027</option>
                        <option>2027/2028</option>
                    </select>
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Semester</label>
                    <select class="w-full border border-border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option selected>Ganjil</option>
                        <option>Genap</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Tanggal Mulai PKL</label>
                    <input type="date" value="2026-07-15" class="w-full border border-border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Tanggal Selesai PKL</label>
                    <input type="date" value="2026-12-15" class="w-full border border-border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            
            <div class="flex justify-end pt-4">
                <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-semibold text-foreground border-b border-border pb-4 mb-6">Keamanan Akun</h3>
        
        <form class="space-y-6">
            <div class="space-y-2">
                <label class="text-sm font-medium text-foreground">Email Administrator</label>
                <input type="email" value="admin@syntra.sch.id" class="w-full border border-border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500 bg-muted/50" readonly>
                <p class="text-xs text-muted-foreground">Hubungi super-admin untuk mengubah email utama ini.</p>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-foreground">Kata Sandi Baru</label>
                <input type="password" placeholder="Masukkan kata sandi baru" class="w-full border border-border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-foreground">Konfirmasi Kata Sandi Baru</label>
                <input type="password" placeholder="Ketik ulang kata sandi baru" class="w-full border border-border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end pt-4">
                <button type="button" class="px-6 py-2 bg-foreground text-background rounded-lg font-medium hover:bg-foreground/90 transition-colors">
                    Perbarui Kata Sandi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
