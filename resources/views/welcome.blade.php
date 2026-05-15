<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syntra - Platform Monitoring PKL Modern</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background antialiased font-sans">
    
    <!-- Navbar -->
    <nav x-data="{ isOpen: false }" class="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-md border-b border-border z-50">
      <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
          <a href="{{ url('/') }}" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-lg">S</span>
            </div>
            <span class="font-semibold text-xl text-foreground">Syntra</span>
          </a>

          <!-- Desktop Menu -->
          <div class="hidden md:flex items-center gap-8">
            <a href="#fitur" class="text-muted-foreground hover:text-foreground transition-colors">
              Fitur
            </a>
            <a href="#tentang" class="text-muted-foreground hover:text-foreground transition-colors">
              Tentang
            </a>
            <a href="{{ url('/login') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
              Login
            </a>
          </div>

          <!-- Mobile Menu Button -->
          <button
            @click="isOpen = !isOpen"
            class="md:hidden p-2 text-muted-foreground hover:text-foreground"
          >
            <!-- Menu Icon -->
            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            <!-- X Icon -->
            <svg x-show="isOpen" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" style="display: none;" class="md:hidden pt-4 pb-2 flex flex-col gap-3">
          <a @click="isOpen = false" href="#fitur" class="text-muted-foreground hover:text-foreground transition-colors py-2">
            Fitur
          </a>
          <a @click="isOpen = false" href="#tentang" class="text-muted-foreground hover:text-foreground transition-colors py-2">
            Tentang
          </a>
          <a @click="isOpen = false" href="{{ url('/login') }}" class="text-muted-foreground hover:text-foreground transition-colors py-2">
            Login
          </a>
        </div>
      </div>
    </nav>

    <!-- HeroSection -->
    <section class="pt-32 pb-20 px-6">
      <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
          <!-- Left Content -->
          <div class="space-y-6">
            <div class="inline-block px-4 py-2 bg-blue-50 border border-blue-200 rounded-full">
              <span class="text-sm text-blue-700">Platform Monitoring PKL Modern</span>
            </div>

            <h1 class="text-5xl lg:text-6xl font-bold text-foreground leading-tight">
              Platform Monitoring PKL yang Modern dan Efisien
            </h1>

            <p class="text-lg text-muted-foreground leading-relaxed">
              Kelola jurnal harian, pantau perkembangan siswa, dan tingkatkan komunikasi antara siswa dan pembimbing dalam satu platform.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
              <a href="{{ url('/login') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                Mulai Sekarang
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </a>
              <a href="{{ url('/login') }}" class="px-6 py-3 bg-white border border-border text-foreground rounded-lg hover:bg-muted transition-colors text-center flex items-center justify-center">
                Login
              </a>
            </div>
          </div>

          <!-- Right Content - Dashboard Preview -->
          <div class="relative">
            <div class="rounded-2xl overflow-hidden shadow-2xl border border-border bg-white">
              <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-3 border-b border-border">
                <div class="flex gap-2">
                  <div class="w-3 h-3 rounded-full bg-red-400"></div>
                  <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                  <div class="w-3 h-3 rounded-full bg-green-400"></div>
                </div>
              </div>
              <img
                src="https://images.unsplash.com/photo-1666875753105-c63a6f3bdc86?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwyfHxtb2Rlcm4lMjBkYXNoYm9hcmQlMjBpbnRlcmZhY2UlMjBhbmFseXRpY3MlMjBjaGFydHxlbnwxfHx8fDE3Nzg4MjIzNzJ8MA&ixlib=rb-4.1.0&q=80&w=1080"
                alt="Dashboard Preview"
                class="w-full h-auto"
              />
            </div>

            <!-- Decorative Elements -->
            <div class="absolute -z-10 -top-10 -right-10 w-72 h-72 bg-blue-200 rounded-full blur-3xl opacity-20"></div>
            <div class="absolute -z-10 -bottom-10 -left-10 w-72 h-72 bg-indigo-200 rounded-full blur-3xl opacity-20"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- FeaturesSection -->
    <section id="fitur" class="py-20 px-6 bg-muted/30">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 space-y-4">
          <h2 class="text-4xl font-bold text-foreground">Fitur Unggulan</h2>
          <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
            Semua yang Anda butuhkan untuk monitoring PKL yang efektif dan efisien
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-border">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center mb-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            </div>
            <h3 class="text-xl font-semibold text-foreground mb-3">
              Jurnal Harian Digital
            </h3>
            <p class="text-muted-foreground leading-relaxed">
              Siswa dapat mencatat aktivitas PKL setiap hari secara digital dengan mudah dan terstruktur. Upload foto dokumentasi dan catat progress harian dengan praktis.
            </p>
          </div>
          <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-border">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center mb-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
            </div>
            <h3 class="text-xl font-semibold text-foreground mb-3">
              Monitoring Progress PKL
            </h3>
            <p class="text-muted-foreground leading-relaxed">
              Pantau perkembangan siswa secara real-time dengan dashboard komprehensif. Visualisasi progress memudahkan evaluasi dan identifikasi area yang perlu perhatian.
            </p>
          </div>
          <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-border">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center mb-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            </div>
            <h3 class="text-xl font-semibold text-foreground mb-3">
              Review dan Persetujuan Pembimbing
            </h3>
            <p class="text-muted-foreground leading-relaxed">
              Pembimbing dapat memberikan feedback, menyetujui jurnal, dan berkomunikasi langsung dengan siswa melalui platform. Proses review menjadi lebih cepat dan efisien.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- AboutSection -->
    <section id="tentang" class="py-20 px-6">
      <div class="max-w-4xl mx-auto">
        <div class="space-y-12">
          <div class="text-center space-y-4">
            <h2 class="text-4xl font-bold text-foreground">Tentang Syntra</h2>
            <p class="text-lg text-muted-foreground max-w-3xl mx-auto">
              Platform monitoring PKL yang dirancang khusus untuk SMK, membantu digitalisasi proses pengawasan praktik kerja lapangan
            </p>
          </div>

          <div class="grid md:grid-cols-2 gap-6">
            <!-- Card 1 - Masalah -->
            <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-2xl p-8 border border-red-100">
              <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-foreground mb-3">Tantangan Monitoring PKL</h3>
              <p class="text-muted-foreground leading-relaxed">
                Memantau ratusan siswa di berbagai lokasi industri dengan jurnal manual menyulitkan sekolah dalam evaluasi progress dan komunikasi yang efektif.
              </p>
            </div>

            <!-- Card 2 - Solusi -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
              <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-foreground mb-3">Solusi Digital Terintegrasi</h3>
              <p class="text-muted-foreground leading-relaxed">
                Syntra menghadirkan sistem digital yang memudahkan pencatatan jurnal, monitoring real-time, dan komunikasi antara siswa, pembimbing sekolah, dan industri.
              </p>
            </div>

            <!-- Card 3 - Manfaat -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 border border-green-100">
              <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-foreground mb-3">Peningkatan Kualitas PKL</h3>
              <p class="text-muted-foreground leading-relaxed">
                Meningkatkan kualitas pengawasan dan memastikan setiap siswa mendapatkan pengalaman pembelajaran yang optimal selama PKL.
              </p>
            </div>

            <!-- Card 4 - Visi -->
            <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-2xl p-8 border border-purple-100">
              <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-foreground mb-3">Transformasi Digital PKL</h3>
              <p class="text-muted-foreground leading-relaxed">
                Saatnya beralih dari jurnal manual ke sistem digital yang modern, efisien, dan terintegrasi untuk monitoring PKL yang lebih baik.
              </p>
            </div>
          </div>

          <!-- Stats Section -->
          <div class="bg-white rounded-2xl p-8 border border-border shadow-sm">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
              <div class="text-center">
                <div class="text-3xl font-bold text-blue-600 mb-2">100%</div>
                <div class="text-sm text-muted-foreground">Digital</div>
              </div>
              <div class="text-center">
                <div class="text-3xl font-bold text-indigo-600 mb-2">Real-time</div>
                <div class="text-sm text-muted-foreground">Monitoring</div>
              </div>
              <div class="text-center">
                <div class="text-3xl font-bold text-blue-600 mb-2">Efisien</div>
                <div class="text-sm text-muted-foreground">Workflow</div>
              </div>
              <div class="text-center">
                <div class="text-3xl font-bold text-indigo-600 mb-2">Terintegrasi</div>
                <div class="text-sm text-muted-foreground">Platform</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CallToActionSection -->
    <section class="py-20 px-6">
      <div class="max-w-5xl mx-auto">
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 to-indigo-600 rounded-3xl p-12 md:p-16">
          <!-- Background Decoration -->
          <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
          <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

          <div class="relative z-10 text-center space-y-6">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full border border-white/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
              <span class="text-sm text-white font-medium">Mulai Transformasi Digital PKL</span>
            </div>

            <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight">
              Siap Modernisasi Monitoring PKL Anda?
            </h2>

            <p class="text-lg md:text-xl text-blue-50 max-w-2xl mx-auto leading-relaxed">
              Bergabunglah dengan sekolah-sekolah yang telah merasakan kemudahan monitoring PKL digital dengan Syntra
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
              <a href="{{ url('/login') }}" class="px-8 py-4 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-colors flex items-center justify-center gap-2 shadow-lg">
                Mulai Gratis
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </a>
        
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-6 border-t border-border bg-muted/30">
      <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
          <a href="{{ url('/') }}" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-lg">S</span>
            </div>
            <span class="font-semibold text-xl text-foreground">Syntra</span>
          </a>

          <div class="text-muted-foreground text-sm">
            &copy; 2026 Syntra. Platform Monitoring PKL Modern.
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
