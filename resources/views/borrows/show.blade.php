<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Detail — Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen">

    <!-- Custom Delete Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm mx-4">
            <div class="flex items-center justify-center w-12 h-12 bg-red-100 rounded-full mx-auto mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 text-center">Delete Confirmation</h3>
            <p class="text-sm text-slate-500 text-center mt-1 mb-6">Are you sure? This action cannot be undone.</p>
            <div class="flex gap-3">
                <button onclick="closeModal()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium py-2.5 rounded-lg transition">Cancel</button>
                <button id="confirmDelete" class="flex-1 bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2.5 rounded-lg transition">Yes, Delete</button>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
        <span class="text-lg font-semibold text-slate-800 tracking-tight">📚 Library Management</span>
        <div class="flex gap-6 text-sm font-medium text-slate-500">
            <a href="{{ route('book.index') }}" class="hover:text-slate-800 transition">Books</a>
            <a href="{{ route('member.index') }}" class="hover:text-slate-800 transition">Members</a>
            <a href="{{ route('borrow.index') }}" class="text-indigo-600 border-b-2 border-indigo-600 pb-0.5">Borrow Records</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-6 py-10">
        <div class="mb-6">
            <a href="{{ route('borrow.index') }}" class="text-sm text-slate-400 hover:text-slate-600 transition">← Back to Borrow Records</a>
            <h1 class="text-2xl font-bold text-slate-800 mt-2">Borrow Detail</h1>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

            <!-- Status Badge -->
            <div class="flex items-center justify-between mb-6">
                <span class="text-xs text-slate-400">Record #{{ $borrow->id }}</span>
                @if ($borrow->return_date)
                    <span class="bg-emerald-50 text-emerald-600 text-xs font-medium px-3 py-1 rounded-full">✅ Returned</span>
                @else
                    <span class="bg-amber-50 text-amber-600 text-xs font-medium px-3 py-1 rounded-full">📖 Currently Borrowed</span>
                @endif
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div class="border border-slate-100 rounded-lg p-4">
                    <p class="text-xs text-slate-400 mb-1">Book</p>
                    <p class="text-sm font-semibold text-slate-800">{{ $borrow->book->title }}</p>
                </div>
                <div class="border border-slate-100 rounded-lg p-4">
                    <p class="text-xs text-slate-400 mb-1">Member</p>
                    <p class="text-sm font-semibold text-slate-800">{{ $borrow->member->name }}</p>
                </div>
                <div class="border border-slate-100 rounded-lg p-4">
                    <p class="text-xs text-slate-400 mb-1">Borrow Date</p>
                    <p class="text-sm font-semibold text-slate-800">{{ $borrow->borrow_date }}</p>
                </div>
                <div class="border border-slate-100 rounded-lg p-4">
                    <p class="text-xs text-slate-400 mb-1">Return Date</p>
                    <p class="text-sm font-semibold text-slate-800">{{ $borrow->return_date ?? 'Not returned yet' }}</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="border-t border-slate-100 pt-4 flex gap-3">
                <a href="{{ route('borrow.edit', $borrow->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition">Edit</a>
                <a href="{{ route('borrow.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium px-4 py-2 rounded-lg transition">Back</a>
                <form method="POST" action="{{ route('borrow.destroy', $borrow->id) }}" onsubmit="return false;" class="ml-auto">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDeleteModal(this.closest('form'))" class="bg-red-50 hover:bg-red-100 text-red-600 text-sm font-medium px-4 py-2 rounded-lg transition">Delete</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        let formToSubmit = null;
        function confirmDeleteModal(form) {
            formToSubmit = form;
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            formToSubmit = null;
        }
        document.getElementById('confirmDelete').addEventListener('click', () => {
            if (formToSubmit) formToSubmit.submit();
        });
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    </script>

</body>
</html>
