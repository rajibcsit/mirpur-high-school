<!DOCTYPE html>
@php
    $schoolSettings = \App\Models\Setting::first();
    $schoolName = $schoolSettings?->school_name ?: 'Mirpur High School';
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ $schoolName }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside id="admin-sidebar" class="fixed md:static z-40 -translate-x-full md:translate-x-0 transition-transform w-64 bg-primary-dark text-white min-h-screen flex flex-col">
        <div class="p-6 border-b border-white/10">
            <p class="font-bold text-lg">MHS Admin</p>
            <p class="text-xs text-gray-300">{{ $schoolName }}</p>
        </div>
        <nav class="flex-1 p-4 space-y-1 text-sm">
            @php
                $links = [
                    ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '🏠'],
                    ['route' => 'admin.academics.index', 'label' => 'Academics', 'icon' => '📚'],
                    ['route' => 'admin.sliders.index', 'label' => 'Hero Sliders', 'icon' => '🖼️'],
                    ['route' => 'admin.students.index', 'label' => 'Students', 'icon' => '🎓'],
                    ['route' => 'admin.results.index', 'label' => 'Results', 'icon' => '📊'],
                    ['route' => 'admin.routines.index', 'label' => 'Class Routines', 'icon' => '🗓️'],
                    ['route' => 'admin.notices.index', 'label' => 'Notices', 'icon' => '📢'],
                    ['route' => 'admin.news.index', 'label' => 'Latest News', 'icon' => '📰'],
                    ['route' => 'admin.events.index', 'label' => 'Events', 'icon' => '📅'],
                    ['route' => 'admin.gallery.index', 'label' => 'Gallery', 'icon' => '🖼️'],
                    ['route' => 'admin.teachers.index', 'label' => 'Teachers', 'icon' => '👩‍🏫'],
                    ['route' => 'admin.admissions.index', 'label' => 'Admissions', 'icon' => '📝'],
                    ['route' => 'admin.messages.index', 'label' => 'Messages', 'icon' => '✉️'],
                    ['route' => 'admin.settings.edit', 'label' => 'Settings', 'icon' => '⚙️'],
                ];
            @endphp
            @foreach($links as $link)
                <a href="{{ route($link['route']) }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition {{ request()->routeIs(str_replace('.index','',$link['route']).'*') ? 'bg-white/15 font-semibold' : '' }}">
                    <span>{{ $link['icon'] }}</span> {{ $link['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="p-4 border-t border-white/10">
            <a href="{{ route('home') }}" target="_blank" class="block text-sm text-gray-300 hover:text-white mb-3">🌐 View Website</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-red-500/80 hover:bg-red-600 text-sm py-2 rounded-lg transition">Logout</button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="flex-1 min-w-0">
        {{-- Topbar --}}
        <header class="bg-white shadow-sm sticky top-0 z-30 flex items-center justify-between px-6 py-4">
            <div class="flex items-center gap-4">
                <button id="sidebar-toggle" class="md:hidden text-xl">☰</button>
                <h1 class="text-lg font-semibold">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center font-semibold">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
                <span class="text-sm font-medium hidden sm:block">{{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </header>

        <main class="p-6">
            @if (session('success'))
                <div id="flash-message" class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-6 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
