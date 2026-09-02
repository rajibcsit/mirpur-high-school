<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Mirpur ML High School</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-primary to-primary-dark min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center text-white font-bold text-xl mx-auto mb-3">MHS</div>
            <h1 class="text-xl font-bold text-primary">Mirpur ML High School</h1>
            <p class="text-sm text-gray-500">Admin Dashboard Login</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
            </div>
            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" class="rounded"> Remember me
            </label>
            <button type="submit" class="bg-primary text-white w-full py-3 rounded-lg font-semibold hover:bg-primary-dark transition">Sign In</button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            <a href="{{ route('home') }}" class="hover:text-primary">← Back to website</a>
        </p>
    </div>
</body>
</html>
