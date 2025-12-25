<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>News</title>
</head>
<body>
  <x-navbar></x-navbar>


  
    

  <div class="bg-gray-900 py-24 sm:py-32 relative isolate px-6 pt-14 lg:px-8">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Kabar Berita</h2>
      </div>
      <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-2">
        <article class="bg-white rounded-lg shadow hover:shadow-lg transition">
          @if($post->image)
          <img src="{{ asset('storage/'.$post->image) }}"
              class="w-full h-48 object-cover rounded-t-lg">
          @endif
          
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-900">{{ $post ['title'] }}</h3>
            <div class="text-base text-gray-500">
              <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a> | {{ \Carbon\Carbon::parse($post['created_at'])->format('d M Y') }}
            </div>
            <p class="text-sm text-gray-600 mt-2">
              {{ $post['body']}}
            </p>
            <a href="/posts" class="inline-block mt-3 text-blue-600 hover:text-blue-800 font-medium">Kembali</a>
          </div>
        </article>

      </div>
    </div>
  </div>

  

  <x-footer></x-footer>
</body>
</html>