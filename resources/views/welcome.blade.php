<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f172a;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(99, 102, 241, 0.25) 0%, transparent 40%),
                radial-gradient(circle at 80% 30%, rgba(99, 102, 241, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 50% 90%, rgba(245, 158, 11, 0.12) 0%, transparent 40%);
        }

        .grid-pattern {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 44px 44px;
        }

        .glow {
            box-shadow: 0 0 60px rgba(99, 102, 241, 0.35);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .float {
            animation: float 5s ease-in-out infinite;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Grid pattern overlay -->
    <div class="absolute inset-0 grid-pattern"></div>

    <!-- Decorative book icons floating in background -->
    <svg class="absolute top-[12%] left-[10%] w-10 h-10 text-indigo-400/20 float" style="animation-delay:0s" fill="none"
        stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
    </svg>
    <svg class="absolute bottom-[15%] right-[12%] w-14 h-14 text-amber-400/15 float" style="animation-delay:1.5s"
        fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
    </svg>
    <svg class="absolute top-[20%] right-[18%] w-8 h-8 text-indigo-400/20 float" style="animation-delay:0.8s"
        fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
    </svg>
    <svg class="absolute bottom-[22%] left-[15%] w-9 h-9 text-amber-400/15 float" style="animation-delay:2.3s"
        fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
    </svg>

    <!-- Main content card -->
    <div
        class="relative z-10 text-center px-10 py-14 mx-6 max-w-lg w-full bg-white/[0.06] backdrop-blur-xl border border-white/10 rounded-2xl">

        <!-- Icon -->
        <div class="w-16 h-16 bg-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-6 glow">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>

        <!-- Title -->
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-3 tracking-tight">
            Library Management System
        </h1>
        <p class="text-slate-400 mb-10 text-sm md:text-base">
            Manage books, members, and borrow records — all in one place.
        </p>

        <!-- Buttons -->
        <div class="flex items-center justify-center gap-4">
            <a href="{{ route('login') }}"
                class="bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium px-7 py-3 rounded-lg transition">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="bg-white/10 hover:bg-white/20 text-white text-sm font-medium px-7 py-3 rounded-lg border border-white/10 transition">
                Register
            </a>
        </div>

    </div>

</body>

</html>
