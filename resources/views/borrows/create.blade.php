<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Borrow Record — Library</title>
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
            <h1 class="text-2xl font-bold text-slate-800 mt-2">New Borrow Record</h1>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <form method="POST" action="{{ route('borrow.store') }}">
                @csrf

                <!-- Book Select -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Book</label>
                    <select name="book_id"
                        class="w-full border border-slate-200 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent bg-white">
                        <option value="">-- Select Book --</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Member Select -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Member</label>
                    <select name="member_id"
                        class="w-full border border-slate-200 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent bg-white">
                        <option value="">-- Select Member --</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                    @error('member_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Borrow Date</label>
                        <input type="date" name="borrow_date"
                            class="w-full border border-slate-200 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        @error('borrow_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Return Date <span
                                class="text-slate-400 font-normal">(optional)</span></label>
                        <input type="date" name="return_date"
                            class="w-full border border-slate-200 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        @error('return_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition">Save
                        Record</button>
                    <a href="{{ route('borrow.index') }}"
                        class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium px-5 py-2.5 rounded-lg transition">Cancel</a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
