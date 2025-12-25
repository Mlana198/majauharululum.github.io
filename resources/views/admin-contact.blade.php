<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Admin Contact</title>
</head>

<x-navbar></x-navbar>
<body class="relative isolate bg-gray-900 py-24 sm:py-32">
    <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>
    <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>
    <div class="max-w-7xl mx-10 bg-white shadow rounded-2xl p-6">


        <h1 class="text-3xl font-bold mb-6">Kelola Contact</h1>



        <!-- Kelola About -->
        <div class="block p-5 mb-20 bg-blue-600 text-white rounded-xl shadow">
            <h2 class="text-xl text-center font-semibold">Kelola Contact</h2>
        </div>


        <div class="mb-20 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-xl font-medium mb-1">Judul</label>
              <input type="string" name="judul" class="w-full rounded-md border-gray-300" />
            </div>

            <div>
              <label class="block text-xl font-medium mb-1">Artikel</label>
              <input type="text" name="isi" class="w-full rounded-md border-gray-300"  />
            </div>
        </div>

    </div>
</body>
</html>