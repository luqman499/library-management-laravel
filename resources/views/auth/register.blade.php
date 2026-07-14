<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Library Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f172a;
            background-image:
                radial-gradient(circle at 15% 15%, rgba(99, 102, 241, 0.22) 0%, transparent 38%),
                radial-gradient(circle at 85% 25%, rgba(99, 102, 241, 0.14) 0%, transparent 38%),
                radial-gradient(circle at 50% 95%, rgba(245, 158, 11, 0.1) 0%, transparent 38%);
        }

        .glow {
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
        }
    </style>
</head>

<body class="h-screen flex items-center justify-center px-6 overflow-hidden">

    <div class="w-full max-w-sm">
        <div class="bg-white/[0.06] backdrop-blur-xl border border-white/10 rounded-2xl px-7 py-5">

            <!-- Icon + Title -->
            <div class="text-center mb-4">
                <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center mx-auto mb-2 glow">
                    <svg class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h1 class="text-lg font-bold text-white mb-0.5">Create your account</h1>
                <p class="text-slate-400 text-xs">Join to start managing the library</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-2.5">
                    <label for="name" class="block text-xs font-medium text-slate-300 mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                        placeholder="Your full name"
                        class="w-full bg-white/[0.06] border border-white/10 rounded-lg px-3 py-1.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    @error('name')
                        <p class="text-red-400 text-xs mt-0.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-2.5">
                    <label for="email" class="block text-xs font-medium text-slate-300 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        placeholder="you@example.com"
                        class="w-full bg-white/[0.06] border border-white/10 rounded-lg px-3 py-1.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    @error('email')
                        <p class="text-red-400 text-xs mt-0.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-2.5">
                    <label for="password" class="block text-xs font-medium text-slate-300 mb-1">Password</label>
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                        class="w-full bg-white/[0.06] border border-white/10 rounded-lg px-3 py-1.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    @error('password')
                        <p class="text-red-400 text-xs mt-0.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-xs font-medium text-slate-300 mb-1">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        placeholder="••••••••"
                        class="w-full bg-white/[0.06] border border-white/10 rounded-lg px-3 py-1.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    @error('password_confirmation')
                        <p class="text-red-400 text-xs mt-0.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium py-2 rounded-lg transition">
                    Create account
                </button>

            </form>

            <!-- Login Link -->
            <p class="text-center text-xs text-slate-400 mt-3">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium transition">
                    Log in
                </a>
            </p>

            <!-- Back to home -->
            <p class="text-center mt-2 pt-2 border-t border-white/5">
                <a href="{{ url('/') }}" class="text-xs text-slate-500 hover:text-slate-300 transition">← Back to
                    home</a>
            </p>

        </div>
    </div>

</body>

</html>
