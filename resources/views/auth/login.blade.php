<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Library Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f172a;
            background-image:
                radial-gradient(circle at 15% 15%, rgba(99, 102, 241, 0.22) 0%, transparent 38%),
                radial-gradient(circle at 85% 25%, rgba(99, 102, 241, 0.14) 0%, transparent 38%),
                radial-gradient(circle at 50% 95%, rgba(245, 158, 11, 0.1) 0%, transparent 38%);
        }
        .glow { box-shadow: 0 0 40px rgba(99, 102, 241, 0.3); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-6 py-8">

    <div class="w-full max-w-sm">
        <div class="bg-white/[0.06] backdrop-blur-xl border border-white/10 rounded-2xl px-8 py-9">

            <!-- Icon + Title -->
            <div class="text-center mb-6">
                <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4 glow">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h1 class="text-xl font-bold text-white mb-1">Welcome back</h1>
                <p class="text-slate-400 text-xs">Log in to access your library</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs px-3 py-2.5 rounded-lg mb-5">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-xs font-medium text-slate-300 mb-1.5">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                           placeholder="you@example.com"
                           class="w-full bg-white/[0.06] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-xs font-medium text-slate-300 mb-1.5">Password</label>
                    <input type="password" name="password" id="password" required
                           placeholder="••••••••"
                           class="w-full bg-white/[0.06] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember"
                               class="w-3.5 h-3.5 rounded border-white/20 bg-white/[0.06] text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0">
                        <span class="text-xs text-slate-400">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-indigo-400 hover:text-indigo-300 transition">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium py-2.5 rounded-lg transition">
                    Log in
                </button>

            </form>

            <!-- Register Link -->
            <p class="text-center text-xs text-slate-400 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium transition">
                    Register
                </a>
            </p>

        </div>

        <!-- Back to home -->
        <p class="text-center mt-4">
            <a href="{{ url('/') }}" class="text-xs text-slate-500 hover:text-slate-300 transition">← Back to home</a>
        </p>
    </div>

</body>
</html>
