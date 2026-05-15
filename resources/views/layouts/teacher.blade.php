<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Guru Pembimbing - Syntra</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background antialiased font-sans text-foreground">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        
        <!-- Mobile sidebar backdrop -->
        <div 
            x-show="sidebarOpen" 
            @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-gray-900/80 lg:hidden"
            style="display: none;"
        ></div>

        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-border transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 flex flex-col"
        >
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-border">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">S</span>
                    </div>
                    <span class="font-semibold text-xl text-foreground">Syntra</span>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-muted-foreground hover:text-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <!-- Sidebar Links -->
            <div class="flex-1 overflow-y-auto py-4">
                <nav class="px-4 space-y-1">
                    <a href="{{ route('teacher.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('teacher.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-muted-foreground hover:text-foreground hover:bg-muted/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('teacher.students') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('teacher.students') ? 'bg-blue-50 text-blue-700' : 'text-muted-foreground hover:text-foreground hover:bg-muted/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Siswa Bimbingan
                    </a>
                    <a href="{{ route('teacher.reviews') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('teacher.reviews') ? 'bg-blue-50 text-blue-700' : 'text-muted-foreground hover:text-foreground hover:bg-muted/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>
                        Review Jurnal
                    </a>
                    <a href="{{ route('teacher.assessments') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('teacher.assessments') ? 'bg-blue-50 text-blue-700' : 'text-muted-foreground hover:text-foreground hover:bg-muted/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                        Penilaian
                    </a>
                    <a href="{{ route('teacher.notifications') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('teacher.notifications') ? 'bg-blue-50 text-blue-700' : 'text-muted-foreground hover:text-foreground hover:bg-muted/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                        Notifikasi
                    </a>
                    <a href="{{ route('teacher.profile') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('teacher.profile') ? 'bg-blue-50 text-blue-700' : 'text-muted-foreground hover:text-foreground hover:bg-muted/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Profil
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden bg-background">
            
            <!-- Top Header -->
            <header class="bg-white border-b border-border h-16 flex items-center justify-between px-6 lg:justify-end">
                <button @click="sidebarOpen = true" class="lg:hidden text-muted-foreground hover:text-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </button>
                
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-foreground mr-4 hidden md:block">Budi Santoso, S.Kom.</span>
                    <a href="{{ url('/') }}" class="flex items-center gap-2 px-4 py-2 text-muted-foreground hover:text-foreground transition-colors text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        Keluar
                    </a>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
