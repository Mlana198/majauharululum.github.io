<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-8">
        
        <!-- Logo & Title -->
        <div class="text-center mb-6">
            <img src="{{ asset('asset/logo/MA.png') }}" class="h-14 mx-auto" alt="Logo">

            <h1 class="text-xl font-bold text-gray-800 mt-3">MA JAUHARUL ULUM</h1>
            <h2 class="text-blue-600 font-semibold mt-1 text-lg">Halaman Login !</h2>
            <p class="text-gray-500 text-sm">Calon Siswa Baru MA JAUHARUL ULUM.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="text" name="email"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Masukan Email" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Masukan password" required>
            </div>

            <button type="submit"
                class="flex justify-center w-full py-2 bg-blue-600 text-white rounded-lg">
                Login
            </button>
        </form>


        <p class="text-center text-gray-600 text-sm mt-4">
            Belum punya akun?
            <a href="/register"
               class="text-blue-600 font-semibold hover:underline">
                Daftar Sekarang
            </a>
        </p>
    </div>

</body>
</html>
