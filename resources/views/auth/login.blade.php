<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

        <!-- HEADER -->
        <div class="text-center mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                Admin Login
            </h1>

            <p class="text-gray-500 mt-2">
                Access quiz dashboard
            </p>

        </div>

        <!-- SESSION STATUS -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Password
                </label>

                <input type="password"
                       name="password"
                       required
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- ERROR -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-xl text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                Login
            </button>

        </form>

    </div>

</body>
</html>