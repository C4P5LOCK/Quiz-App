<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

            <a href="/" class="text-2xl font-bold text-blue-600">
                QuizMaster
            </a>

            <div class="flex items-center gap-4">
                <a href="/quiz" class="hover:text-blue-600 font-medium">Quiz</a>
                <a href="/admin/questions" class="hover:text-blue-600 font-medium">Admin</a>
                <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 font-medium">Dashboard</a>
            </div>

        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <main class="py-10 px-4">
        @yield('content')
    </main>

</body>
</html>