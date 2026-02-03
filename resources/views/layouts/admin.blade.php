<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Citra Negara</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: "#699D15",
                            50: '#f1f8e6',
                            100: '#e0efc8',
                            200: '#c5e297',
                            300: '#a3cf60',
                            400: '#84bc34',
                            500: '#699d15',
                            600: '#527e0f',
                            700: '#406111',
                            800: '#354d13',
                            900: '#2d4114',
                        },
                        secondary: {
                            DEFAULT: "#E9DC00",
                            50: '#fefce7',
                            100: '#fdf8c3',
                            200: '#fcf18d',
                            300: '#fae64e',
                            400: '#f9d81d',
                            500: '#e9dc00',
                            600: '#cbb300',
                        },
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        [x-cloak] { display: none !important; }
        
        .sidebar-link {
            @apply flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-primary-50 hover:text-primary-600 transition-colors;
        }
        
        .sidebar-link.active {
            @apply bg-primary-100 text-primary-700 font-medium;
        }
        
        .stat-card {
            @apply bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased" x-data="{ sidebarOpen: true, mobileMenuOpen: false }">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform transition-transform duration-200 ease-in-out"
               :class="{ '-translate-x-full': !sidebarOpen && window.innerWidth >= 1024, '-translate-x-full': !mobileMenuOpen && window.innerWidth < 1024 }"
               @click.away="mobileMenuOpen = false">
            <!-- Logo -->
            <div class="h-16 flex items-center justify-between px-6 border-b border-gray-200">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo-cn.png') }}" alt="Logo" class="h-10 w-auto">
                    <span class="font-bold text-lg text-gray-800">Admin</span>
                </a>
                <button @click="mobileMenuOpen = false" class="lg:hidden text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <!-- PPDB Section -->
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">PPDB</p>
                </div>
                <a href="{{ route('admin.ppdb.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.ppdb.*') && !request('jenjang') ? 'active' : '' }}">
                    <i class="fas fa-user-graduate w-5"></i>
                    <span>Semua Pendaftar</span>
                </a>
                <a href="{{ route('admin.ppdb.index', ['jenjang' => 'smk']) }}" 
                   class="sidebar-link pl-10 {{ request('jenjang') === 'smk' ? 'active' : '' }}">
                    <span class="w-2 h-2 rounded-full bg-primary-500"></span>
                    <span>SMK</span>
                </a>
                <a href="{{ route('admin.ppdb.index', ['jenjang' => 'sma']) }}" 
                   class="sidebar-link pl-10 {{ request('jenjang') === 'sma' ? 'active' : '' }}">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                    <span>SMA</span>
                </a>
                <a href="{{ route('admin.ppdb.index', ['jenjang' => 'smp']) }}" 
                   class="sidebar-link pl-10 {{ request('jenjang') === 'smp' ? 'active' : '' }}">
                    <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                    <span>SMP</span>
                </a>
                
                <!-- Berita Section -->
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Konten</p>
                </div>
                <a href="{{ route('admin.berita.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper w-5"></i>
                    <span>Berita</span>
                </a>
                <a href="{{ route('admin.faq.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.faq.*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle w-5"></i>
                    <span>FAQ</span>
                </a>
                
                <!-- Users Section -->
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengaturan</p>
                </div>
                <a href="{{ route('admin.users.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Pengguna</span>
                </a>
            </nav>
            
            <!-- User Profile -->
            <div class="border-t border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center">
                        <i class="fas fa-user text-primary-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1 lg:ml-64" :class="{ 'lg:ml-64': sidebarOpen, 'lg:ml-0': !sidebarOpen }">
            <!-- Top Bar -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-gray-500 hover:text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <!-- Sidebar Toggle (Desktop) -->
                    <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:block text-gray-500 hover:text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Back to Site -->
                    <a href="{{ route('landing') }}" target="_blank" 
                       class="text-gray-500 hover:text-primary-600 transition-colors" title="Lihat Website">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    
                    <!-- Logout -->
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-red-600 transition-colors" title="Logout">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="p-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-3" 
                         x-data="{ show: true }" 
                         x-show="show"
                         x-transition>
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                        <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center gap-3"
                         x-data="{ show: true }" 
                         x-show="show"
                         x-transition>
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ session('error') }}</span>
                        <button @click="show = false" class="ml-auto text-red-500 hover:text-red-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
                
                @if(session('info'))
                    <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-lg flex items-center gap-3"
                         x-data="{ show: true }" 
                         x-show="show"
                         x-transition>
                        <i class="fas fa-info-circle"></i>
                        <span>{{ session('info') }}</span>
                        <button @click="show = false" class="ml-auto text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Mobile Overlay -->
    <div class="fixed inset-0 bg-black/50 z-40 lg:hidden" 
         x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileMenuOpen = false"
         x-cloak></div>
    
    @stack('scripts')
</body>
</html>
