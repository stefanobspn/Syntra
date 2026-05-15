export function AboutSection() {
  return (
    <section id="tentang" className="py-20 px-6">
      <div className="max-w-4xl mx-auto">
        <div className="space-y-12">
          <div className="text-center space-y-4">
            <h2 className="text-4xl font-bold text-foreground">Tentang Syntra</h2>
            <p className="text-lg text-muted-foreground max-w-3xl mx-auto">
              Platform monitoring PKL yang dirancang khusus untuk SMK, membantu digitalisasi proses pengawasan praktik kerja lapangan
            </p>
          </div>

          <div className="grid md:grid-cols-2 gap-6">
            {/* Card 1 - Masalah */}
            <div className="bg-gradient-to-br from-red-50 to-orange-50 rounded-2xl p-8 border border-red-100">
              <div className="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                <svg className="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
              </div>
              <h3 className="text-xl font-semibold text-foreground mb-3">Tantangan Monitoring PKL</h3>
              <p className="text-muted-foreground leading-relaxed">
                Memantau ratusan siswa di berbagai lokasi industri dengan jurnal manual menyulitkan sekolah dalam evaluasi progress dan komunikasi yang efektif.
              </p>
            </div>

            {/* Card 2 - Solusi */}
            <div className="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
              <div className="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                <svg className="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h3 className="text-xl font-semibold text-foreground mb-3">Solusi Digital Terintegrasi</h3>
              <p className="text-muted-foreground leading-relaxed">
                Syntra menghadirkan sistem digital yang memudahkan pencatatan jurnal, monitoring real-time, dan komunikasi antara siswa, pembimbing sekolah, dan industri.
              </p>
            </div>

            {/* Card 3 - Manfaat */}
            <div className="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 border border-green-100">
              <div className="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                <svg className="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
              </div>
              <h3 className="text-xl font-semibold text-foreground mb-3">Peningkatan Kualitas PKL</h3>
              <p className="text-muted-foreground leading-relaxed">
                Meningkatkan kualitas pengawasan dan memastikan setiap siswa mendapatkan pengalaman pembelajaran yang optimal selama PKL.
              </p>
            </div>

            {/* Card 4 - Visi */}
            <div className="bg-gradient-to-br from-purple-50 to-violet-50 rounded-2xl p-8 border border-purple-100">
              <div className="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                <svg className="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 className="text-xl font-semibold text-foreground mb-3">Transformasi Digital PKL</h3>
              <p className="text-muted-foreground leading-relaxed">
                Saatnya beralih dari jurnal manual ke sistem digital yang modern, efisien, dan terintegrasi untuk monitoring PKL yang lebih baik.
              </p>
            </div>
          </div>

          {/* Stats Section */}
          <div className="bg-white rounded-2xl p-8 border border-border shadow-sm">
            <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
              <div className="text-center">
                <div className="text-3xl font-bold text-blue-600 mb-2">100%</div>
                <div className="text-sm text-muted-foreground">Digital</div>
              </div>
              <div className="text-center">
                <div className="text-3xl font-bold text-indigo-600 mb-2">Real-time</div>
                <div className="text-sm text-muted-foreground">Monitoring</div>
              </div>
              <div className="text-center">
                <div className="text-3xl font-bold text-blue-600 mb-2">Efisien</div>
                <div className="text-sm text-muted-foreground">Workflow</div>
              </div>
              <div className="text-center">
                <div className="text-3xl font-bold text-indigo-600 mb-2">Terintegrasi</div>
                <div className="text-sm text-muted-foreground">Platform</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
