<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="./output.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-12 w-auto" src="{{ asset('unsia.png') }}" alt="Your Company">
            <h2 class="mt-6 text-center text-2xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Error Message for Email -->
                @error('email')
                <div class="text-sm text-red-600">
                    {{ $message }}
                </div>
                @enderror

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" type="email" name="email" autocomplete="email" required autofocus
                               class="block w-full rounded-md bg-gray-50 px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" autocomplete="current-password" required
                               class="block w-full rounded-md bg-gray-50 px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-gray-700 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-gray-400 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>