@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-6 md:p-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        Tes Masuk
    </h1>

    <form method="POST" action="{{ route('tes.submit') }}">
        @csrf

        @foreach ($soals as $index => $soal)
            <div class="mb-8">
                <p class="font-medium text-gray-900 mb-3">
                    {{ $index + 1 }}. {{ $soal->pertanyaan }}
                </p>

                <div class="space-y-2">
                    @foreach (['a','b','c','d'] as $opsi)
                        <label
                            class="flex items-start gap-3 p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition"
                        >
                            <input
                                type="radio"
                                name="jawaban[{{ $soal->id }}]"
                                value="{{ $opsi }}"
                                class="mt-1 text-blue-600 focus:ring-blue-500"
                                required
                            >
                            <span class="text-gray-700">
                                {{ $soal['opsi_'.$opsi] }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="flex justify-end mt-8">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg transition"
            >
                Kirim Jawaban
            </button>
        </div>
    </form>
</div>
@endsection
