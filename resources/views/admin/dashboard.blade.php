@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-gray-800">
            Main Admin Dashboard
        </h1>

        <p class="text-gray-500 mt-2">
            Monitor quiz performance and statistics
        </p>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <!-- TOTAL QUESTIONS -->
        <div class="bg-white rounded-3xl shadow-xl p-8">

            <p class="text-gray-500 text-sm">
                Total Questions
            </p>

            <h2 class="text-5xl font-bold text-blue-600 mt-3">
                {{ $totalQuestions }}
            </h2>

        </div>

        <!-- TOTAL ATTEMPTS -->
        <div class="bg-white rounded-3xl shadow-xl p-8">

            <p class="text-gray-500 text-sm">
                Quiz Attempts
            </p>

            <h2 class="text-5xl font-bold text-green-600 mt-3">
                {{ $totalAttempts }}
            </h2>

        </div>

        <!-- CORRECT ANSWERS -->
        <div class="bg-white rounded-3xl shadow-xl p-8">

            <p class="text-gray-500 text-sm">
                Correct Answers
            </p>

            <h2 class="text-5xl font-bold text-purple-600 mt-3">
                {{ $correctAnswers }}
            </h2>

        </div>

        <!-- PASS RATE -->
        <div class="bg-white rounded-3xl shadow-xl p-8">

            <p class="text-gray-500 text-sm">
                Pass Rate
            </p>

            <h2 class="text-5xl font-bold text-red-500 mt-3">
                {{ $passRate }}%
            </h2>

        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <a href="{{ route('questions.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white p-8 rounded-3xl shadow-xl transition">

            <h2 class="text-2xl font-bold mb-2">
                Manage Questions
            </h2>

            <p class="opacity-80">
                Add, edit and delete quiz questions
            </p>

        </a>

        <a href="/quiz"
           class="bg-green-600 hover:bg-green-700 text-white p-8 rounded-3xl shadow-xl transition">

            <h2 class="text-2xl font-bold mb-2">
                Take Quiz
            </h2>

            <p class="opacity-80">
                Test the current quiz experience
            </p>

        </a>

    </div>

</div>

@endsection