<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Syntra</title>
    
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
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center px-6 py-12">
      <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
          <div class="inline-flex items-center gap-2 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
              <span class="text-white font-bold text-2xl">S</span>
            </div>
            <span class="font-semibold text-3xl text-foreground">Syntra</span>
          </div>
          <p class="text-muted-foreground">Platform Monitoring PKL Modern</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl p-8 shadow-lg border border-border">
          <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-foreground mb-2">Selamat Datang</h2>
            <p class="text-muted-foreground">Masuk ke akun Syntra Anda</p>
          </div>

          <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <div class="space-y-2">
              <label for="email" class="text-sm text-foreground">
                Email
              </label>
              <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                placeholder="nama@email.com"
                required
                class="w-full px-4 py-3 rounded-lg border @error('email') border-red-500 @else border-border @enderror bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
              @error('email')
                <div class="flex items-center gap-1.5 mt-2 text-red-500 text-sm bg-red-50 p-2.5 rounded-lg border border-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    <span class="font-medium">{{ $message }}</span>
                </div>
              @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
              <label for="password" class="text-sm text-foreground">
                Password
              </label>
              <input
                id="password"
                name="password"
                type="password"
                placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                required
                class="w-full px-4 py-3 rounded-lg border @error('password') border-red-500 @else border-border @enderror bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
              @error('password')
                <div class="flex items-center gap-1.5 mt-2 text-red-500 text-sm bg-red-50 p-2.5 rounded-lg border border-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    <span class="font-medium">{{ $message }}</span>
                </div>
              @enderror
            </div>

            <button
              type="submit"
              class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2"
            >
              <!-- LogIn Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
              Masuk
            </button>
          </form>

          <div class="mt-6 text-center space-y-2 flex flex-col">
            <span class="text-sm text-muted-foreground">
              Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
            </span>
            <a href="{{ url('/') }}" class="text-sm text-muted-foreground hover:text-foreground">
              Kembali ke Beranda
            </a>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
