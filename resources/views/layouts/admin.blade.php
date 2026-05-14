<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">

        <!-- BRAND -->
        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Quiz Admin
        </div>

        <!-- NAV -->
        <nav class="flex-1 p-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
   class="block px-4 py-2 rounded-lg hover:bg-gray-700
   {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
    Dashboard
</a>

            <a href="{{ route('questions.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700">
                Questions
            </a>

            <a href="{{ url('/quiz') }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700">
                View Quiz
            </a>

        </nav>

        <!-- LOGOUT -->
        <div class="p-4 border-t border-gray-700">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded-lg">
                    Logout
                </button>
            </form>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">

        @yield('content')

    </main>

</div>

</body>
</html>