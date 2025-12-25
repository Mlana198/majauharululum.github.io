<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Aplikasi PPDB')</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')

    {{-- Alpine.js (opsional tapi berguna) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="font-bold text-lg text-blue-600">
                PPDB Online
            </div>

            <nav class="space-x-4">
                @auth
                    <span class="text-sm text-gray-600">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-red-600 hover:underline text-sm">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline text-sm">
                        Login
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 py-8 px-4">
        @if (session('success'))
            <div class="max-w-4xl mx-auto mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="max-w-4xl mx-auto mb-6 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center text-sm text-gray-500">
            © {{ date('Y') }} PPDB Online • Dibuat dengan Laravel
        </div>
    </footer>

</body>
</html>
