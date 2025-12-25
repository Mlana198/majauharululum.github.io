<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-10">

    <div class="w-full max-w-md bg-white/85 backdrop-blur-md shadow-lg rounded-xl p-6">
        <div class="text-center mb-4">
            <img src="{{ asset('asset/logo/MA.png') }}" class="mx-auto h-12" alt="logo">
            <h2 class="text-2xl font-bold text-blue-600 mt-3">Halaman Daftar!</h2>
            <p class="text-gray-500 text-sm">MA JAUHARUL ULUM</p>
        </div>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 text-sm p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST"
            class="space-y-4 border-b border-gray-300 pb-4 mb-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="name" required class="input">
            </div>

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" required class="input">
            </div>

            <div>
                <label class="block text-sm font-medium">No. HP</label>
                <input type="text" name="no_hp" class="input">
            </div>

            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" required class="input">
            </div>

            <div>
                <label class="block text-sm font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="input">
            </div>

            <button type="submit"
                class="w-full py-2 bg-blue-600 text-white rounded-lg font-semibold">
                Daftar
            </button>
        </form>


        <p class="text-center text-sm mt-4 text-gray-600">
            Sudah punya akun?
            <a href="/login" class="text-blue-600 font-semibold hover:underline">Login</a>
        </p>
    </div>

</body>
</html>
