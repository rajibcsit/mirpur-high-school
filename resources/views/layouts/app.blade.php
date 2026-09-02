<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mirpur ML High School')</title>
    <meta name="description" content="Mirpur ML High School - Building a brighter future through quality education, discipline, and character development since our founding.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    {{-- Top info bar --}}
    <div class="bg-primary text-white text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-col sm:flex-row justify-between items-center gap-1">
            <p>📍 Mirpur, Sadullapur Gaibandha</p>
            <p>📞 +880-1XXX-XXXXXX &nbsp; | &nbsp; ✉️ info@mirpurhighschool.edu</p>
        </div>
    </div>

    {{-- Navbar --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white font-bold text-lg">MHS</div>
                    <div>
                        <p class="text-lg font-bold text-primary leading-tight">Mirpur ML High School</p>
                        <p class="text-xs text-gray-500">Excellence in Education</p>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-8 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-primary {{ request()->routeIs('home') ? 'text-primary font-semibold' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-primary {{ request()->routeIs('about') ? 'text-primary font-semibold' : '' }}">About</a>
                    <a href="{{ route('academics') }}" class="hover:text-primary {{ request()->routeIs('academics') ? 'text-primary font-semibold' : '' }}">Academics</a>
                    <a href="{{ route('teachers.index') }}" class="hover:text-primary {{ request()->routeIs('teachers.index') ? 'text-primary font-semibold' : '' }}">Teachers</a>
                    <a href="{{ route('notices.index') }}" class="hover:text-primary {{ request()->routeIs('notices.*') ? 'text-primary font-semibold' : '' }}">Notices</a>
                    <a href="{{ route('gallery.index') }}" class="hover:text-primary {{ request()->routeIs('gallery.index') ? 'text-primary font-semibold' : '' }}">Gallery</a>
                    <a href="{{ route('contact') }}" class="hover:text-primary {{ request()->routeIs('contact') ? 'text-primary font-semibold' : '' }}">Contact</a>
                    <a href="{{ route('admission.create') }}" class="bg-gold text-white px-5 py-2 rounded-full hover:opacity-90 transition">Admission</a>
                </nav>

                <button id="mobile-menu-btn" class="md:hidden text-gray-700 text-2xl">☰</button>
            </div>

            {{-- Mobile menu --}}
            <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2">
                <a href="{{ route('home') }}" class="block py-2 border-b">Home</a>
                <a href="{{ route('about') }}" class="block py-2 border-b">About</a>
                <a href="{{ route('academics') }}" class="block py-2 border-b">Academics</a>
                <a href="{{ route('teachers.index') }}" class="block py-2 border-b">Teachers</a>
                <a href="{{ route('notices.index') }}" class="block py-2 border-b">Notices</a>
                <a href="{{ route('gallery.index') }}" class="block py-2 border-b">Gallery</a>
                <a href="{{ route('contact') }}" class="block py-2 border-b">Contact</a>
                <a href="{{ route('admission.create') }}" class="block py-2 text-gold font-semibold">Admission</a>
            </div>
        </div>
    </header>

    {{-- Flash messages --}}
    @if (session('success'))
        <div id="flash-message" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-primary-dark text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-white font-bold text-lg mb-3">Mirpur ML High School</h3>
                <p class="text-sm">Committed to nurturing knowledge, discipline, and character in every student since our establishment.</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('academics') }}" class="hover:text-white">Academics</a></li>
                    <li><a href="{{ route('admission.create') }}" class="hover:text-white">Admission</a></li>
                    <li><a href="{{ route('notices.index') }}" class="hover:text-white">Notices</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Resources</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('teachers.index') }}" class="hover:text-white">Our Teachers</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-white">Gallery</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact Us</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white">Admin Login</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Contact</h4>
                <ul class="space-y-2 text-sm">
                    <li>📍 Mirpur, Sadullapur Gaibandha</li>
                    <li>📞 +880-1XXX-XXXXXX</li>
                    <li>✉️ info@mirpurhighschool.edu</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10 text-center text-sm py-4">
            &copy; {{ date('Y') }} Mirpur ML High School. All rights reserved.
        </div>
    </footer>
</body>
</html>
