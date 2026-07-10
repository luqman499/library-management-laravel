<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book — Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
        <span class="text-lg font-semibold text-slate-800 tracking-tight">📚 Library Management</span>
        <div class="flex gap-6 text-sm font-medium text-slate-500">
            <a href="{{ route('book.index') }}" class="hover:text-slate-800 transition">Books</a>
            <a href="{{ route('member.index') }}" class="hover:text-slate-800 transition">Members</a>
            <a href="{{ route('borrow.index') }}" class="text-indigo-600 border-b-2 border-indigo-600 pb-0.5">Borrow
                Records</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-6 py-10">
        <div class="mb-6">
            <a href="{{ route('borrow.index') }}" class="text-sm text-slate-400 hover:text-slate-600 transition">← Back
                to Borrow Records</a>
            <h1 class="text-2xl font-bold text-slate-800 mt-2">Mark as Returned</h1>
        </div>

        <!-- Borrow Info Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-4">
            <h2 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-4">Borrow Details</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-slate-400 mb-1">Book</p>
                    <p class="text-sm font-medium text-slate-800">{{ $borrow->book->title }}</p>
                </div>
                <div>
                    <p class="text-xs text-slate-400 mb-1">Member</p>
                    <p class="text-sm font-medium text-slate-800">{{ $borrow->member->name }}</p>
                </div>
                <div>
                    <p class="text-xs text-slate-400 mb-1">Borrow Date</p>
                    <p class="text-sm font-medium text-slate-800">{{ $borrow->borrow_date }}</p>
                </div>
                <div>
                    <p class="text-xs text-slate-400 mb-1">Status</p>
                    @if ($borrow->return_date)
                        <span
                            class="bg-emerald-50 text-emerald-600 text-xs font-medium px-2 py-1 rounded-full">Returned</span>
                    @else
                        <span
                            class="bg-amber-50 text-amber-600 text-xs font-medium px-2 py-1 rounded-full">Borrowed</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Return Date Form -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <form method="POST" action="{{ route('borrow.update', $borrow->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Return Date</label>
                    <input type="date" name="return_date" value="{{ $borrow->return_date }}"
                        class="w-full border border-slate-200 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('return_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition">Mark
                        as Returned</button>
                    <a href="{{ route('borrow.index') }}"
                        class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium px-5 py-2.5 rounded-lg transition">Cancel</a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
