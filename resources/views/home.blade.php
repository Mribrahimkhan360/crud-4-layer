<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
    <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Welcome Back</h1>
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

<!-- Error Message -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('auth.login') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" name="email" placeholder="Enter your email" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex items-center justify-between">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="remember" class="w-4 h-4">
                <span class="text-gray-600 text-sm">Remember me</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-blue-500 text-sm hover:underline">Forgot Password?</a>
        </div>
        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
            Login
        </button>
    </form>
    <p class="text-center text-gray-600 text-sm mt-4">
        Don’t have an account?
        <a href="{{ route('auth.register') }}" class="text-blue-500 hover:underline">Register</a>
    </p>
</div>
</body>
</html>
