@extends('layouts.teacher')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-foreground mb-2">Penilaian Siswa</h2>
        <p class="text-muted-foreground">Berikan evaluasi dan penilaian akhir untuk siswa bimbingan Anda.</p>
    </div>

    <div class="bg-white border border-border rounded-xl shadow-sm p-6">
        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-border">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-lg">A</div>
            <div>
                <h3 class="font-semibold text-lg text-foreground">Ahmad Fauzi</h3>
                <p class="text-sm text-muted-foreground">PT Digital Solutions</p>
            </div>
            <div class="ml-auto">
                <select class="bg-white border border-border text-sm rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Pilih Siswa Lain...</option>
                    <option>Siti Nurhaliza</option>
                    <option>Budi Santoso</option>
                </select>
            </div>
        </div>

        <form class="space-y-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Aspek Teknis -->
                <div class="space-y-4">
                    <h4 class="font-medium text-foreground border-b border-border pb-2">Aspek Keterampilan Teknis</h4>
                    
                    <div class="space-y-2">
                        <label class="text-sm text-muted-foreground flex justify-between">
                            <span>Penguasaan Alat/Software</span>
                            <span class="font-medium text-foreground">85/100</span>
                        </label>
                        <input type="range" min="0" max="100" value="85" class="w-full h-2 bg-muted rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm text-muted-foreground flex justify-between">
                            <span>Penyelesaian Masalah (Problem Solving)</span>
                            <span class="font-medium text-foreground">90/100</span>
                        </label>
                        <input type="range" min="0" max="100" value="90" class="w-full h-2 bg-muted rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm text-muted-foreground flex justify-between">
                            <span>Kualitas Hasil Kerja</span>
                            <span class="font-medium text-foreground">88/100</span>
                        </label>
                        <input type="range" min="0" max="100" value="88" class="w-full h-2 bg-muted rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>
                </div>

                <!-- Aspek Non-Teknis -->
                <div class="space-y-4">
                    <h4 class="font-medium text-foreground border-b border-border pb-2">Aspek Sikap & Kedisiplinan</h4>
                    
                    <div class="space-y-2">
                        <label class="text-sm text-muted-foreground flex justify-between">
                            <span>Kehadiran dan Ketepatan Waktu</span>
                            <span class="font-medium text-foreground">95/100</span>
                        </label>
                        <input type="range" min="0" max="100" value="95" class="w-full h-2 bg-muted rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm text-muted-foreground flex justify-between">
                            <span>Kerja Sama Tim</span>
                            <span class="font-medium text-foreground">92/100</span>
                        </label>
                        <input type="range" min="0" max="100" value="92" class="w-full h-2 bg-muted rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm text-muted-foreground flex justify-between">
                            <span>Inisiatif dan Kemandirian</span>
                            <span class="font-medium text-foreground">87/100</span>
                        </label>
                        <input type="range" min="0" max="100" value="87" class="w-full h-2 bg-muted rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm text-foreground font-medium">Catatan / Evaluasi Umum</label>
                <textarea rows="4" class="w-full p-3 border border-border rounded-lg bg-input-background focus:ring-2 focus:ring-blue-500 outline-none text-sm" placeholder="Berikan catatan tambahan untuk siswa..."></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-border">
                <button type="button" class="px-6 py-2 border border-border rounded-lg text-sm font-medium hover:bg-muted transition-colors">Batal</button>
                <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors shadow-sm">Simpan Penilaian</button>
            </div>
        </form>
    </div>
</div>
@endsection
