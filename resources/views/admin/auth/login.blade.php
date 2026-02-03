<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Citra Negara</title>
    
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
                            500: '#699d15',
                            600: '#527e0f',
                            700: '#406111',
                        },
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-green-50 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo-cn.png') }}" alt="Logo Citra Negara" class="h-20 mx-auto mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
            <p class="text-gray-500 mt-1">Citra Negara School</p>
        </div>
        
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Login Admin</h2>
            
            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            
            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
                @csrf
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                               placeholder="admin@example.com"
                               required 
                               autofocus>
                    </div>
                </div>
                
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative" x-data="{ showPassword: false }">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input :type="showPassword ? 'text' : 'password'" 
                               id="password" 
                               name="password"
                               class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                               placeholder="••••••••"
                               required>
                        <button type="button" 
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="text-sm text-gray-600">Ingat saya</span>
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-4 rounded-lg transition-colors focus:ring-4 focus:ring-primary-200">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk
                </button>
            </form>
        </div>
        
        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="{{ route('landing') }}" class="text-gray-500 hover:text-primary-600 transition-colors text-sm">
                <i class="fas fa-arrow-left mr-1"></i>
                Kembali ke Website
            </a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
