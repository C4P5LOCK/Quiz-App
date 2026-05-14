@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-3xl shadow-2xl p-10 text-center">

        <div class="mb-6">
            <h1 class="text-5xl font-bold text-blue-600">
                Quiz Result
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

            <div class="bg-blue-50 rounded-2xl p-6">
                <p class="text-sm text-gray-500">Score</p>
                <h2 class="text-3xl font-bold text-blue-700">
                    {{ $score }}
                </h2>
            </div>

            <div class="bg-green-50 rounded-2xl p-6">
                <p class="text-sm text-gray-500">Percentage</p>
                <h2 class="text-3xl font-bold text-green-700">
                    {{ $percentage }}%
                </h2>
            </div>

            <div class="bg-purple-50 rounded-2xl p-6">
                <p class="text-sm text-gray-500">Status</p>
                <h2 class="text-3xl font-bold text-purple-700">
                    {{ $status }}
                </h2>
            </div>

        </div>

        @if($secret)
            <div class="bg-green-100 border border-green-300 p-6 rounded-2xl mb-8">
                <h2 class="font-bold text-xl mb-2">
                    Secret Unlocked 🎉
                </h2>

                <p>
                    {{ $secret->message }}
                </p>
            </div>
        @endif

        <a href="{{ route('quiz.review', $attemptId) }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-semibold transition">
            Review Answers
        </a>

    </div>

</div>

@endsection