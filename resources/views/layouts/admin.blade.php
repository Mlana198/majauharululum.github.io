<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 min-h-screen">

<!-- TOPBAR MOBILE -->
<div class="lg:hidden fixed top-0 inset-x-0 z-40 flex items-center justify-between
            bg-gray-900 text-white px-4 py-3 border-b border-gray-700">
    <span class="font-semibold">Admin Panel</span>
    <button onclick="toggleSidebar()" class="text-2xl">☰</button>
</div>

<!-- OVERLAY -->
<div id="overlay"
     onclick="toggleSidebar()"
     class="fixed inset-0 bg-black/50 hidden z-30 lg:hidden"></div>

<!-- SIDEBAR -->
<aside id="sidebar"
       class="fixed z-40 inset-y-0 left-0 w-64 bg-gray-950 text-white
              transform -translate-x-full lg:translate-x-0
              transition-transform duration-300">

    <div class="p-5 text-xl font-bold border-b border-gray-700">
        ADMIN PANEL
    </div>

    <nav class="p-4 flex flex-col gap-1 text-sm">

        <a href="{{ route('admin.dashboard') }}"
           class="px-4 py-2 rounded
           {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
            Dashboard
        </a>

        <a href="{{ route('admin.about.edit') }}"
           class="px-4 py-2 rounded
           {{ request()->routeIs('admin.about.*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
            About
        </a>

        <a href="{{ route('admin.news.index') }}"
           class="px-4 py-2 rounded
           {{ request()->routeIs('admin.news.*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
            News
        </a>

        <a href="{{ route('admin.contact') }}"
           class="px-4 py-2 rounded
           {{ request()->routeIs('admin.contact') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
            Contact
        </a>

        <a href="{{ route('admin.ppdb.index') }}"
           class="px-4 py-2 rounded
           {{ request()->routeIs('admin.ppdb.*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
            PPDB
        </a>

        <a href="{{ route('admin.tes-masuk.index') }}"
           class="px-4 py-2 rounded
           {{ request()->routeIs('admin.tes-masuk.*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
            Tes Masuk
        </a>

        <form method="POST" action="/logout" class="mt-6">
            @csrf
            <button class="w-full px-4 py-2 bg-red-600 rounded hover:bg-red-700">
                Logout
            </button>
        </form>
    </nav>
</aside>

<!-- CONTENT -->
<main class="pt-20 lg:pt-10 lg:ml-64 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow rounded-2xl p-6">
            @yield('content')
        </div>
    </div>
</main>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('-translate-x-full');
        document.getElementById('overlay').classList.toggle('hidden');
    }
</script>

</body>
</html>
