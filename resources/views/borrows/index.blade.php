<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Records — Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen">

    <!-- Custom Delete Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm mx-4">
            <div class="flex items-center justify-center w-12 h-12 bg-red-100 rounded-full mx-auto mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 text-center">Delete Confirmation</h3>
            <p class="text-sm text-slate-500 text-center mt-1 mb-6">Are you sure? This action cannot be undone.</p>
            <div class="flex gap-3">
                <button onclick="closeModal()"
                    class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium py-2.5 rounded-lg transition">Cancel</button>
                <button id="confirmDelete"
                    class="flex-1 bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2.5 rounded-lg transition">Yes,
                    Delete</button>
            </div>
        </div>
    </div>

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

    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Borrow Records</h1>
                <p class="text-sm text-slate-500 mt-1">Track borrowed and returned books</p>
            </div>
            <a href="{{ route('borrow.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">+
                New Borrow</a>
        </div>

        @if (session()->has('success'))
            <div id="successAlert"
                class="flex items-center justify-between bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm px-4 py-3 rounded-lg mb-6">
                <span>✅ {{ session('success') }}</span>
                <button onclick="this.parentElement.remove()"
                    class="text-emerald-500 hover:text-emerald-700 ml-4 font-bold">✕</button>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">#</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Book</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Member</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Borrow Date</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Return Date</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Status</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($borrows as $index => $borrow)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-5 py-3 text-slate-400">{{ $borrows->firstItem() + $index }}</td>
                            <td class="px-5 py-3 font-medium text-slate-800">{{ $borrow->book->title }}</td>
                            <td class="px-5 py-3 text-slate-600">{{ $borrow->member->name }}</td>
                            <td class="px-5 py-3 text-slate-600">{{ $borrow->borrow_date }}</td>
                            <td class="px-5 py-3 text-slate-600">{{ $borrow->return_date ?? '—' }}</td>
                            <td class="px-5 py-3">
                                @if ($borrow->return_date)
                                    <span
                                        class="bg-emerald-50 text-emerald-600 text-xs font-medium px-2 py-1 rounded-full">Returned</span>
                                @else
                                    <span
                                        class="bg-amber-50 text-amber-600 text-xs font-medium px-2 py-1 rounded-full">Borrowed</span>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('borrow.show', $borrow->id) }}"
                                        class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded-md transition">View</a>
                                    <a href="{{ route('borrow.edit', $borrow->id) }}"
                                        class="text-xs bg-amber-50 hover:bg-amber-100 text-amber-700 px-3 py-1.5 rounded-md transition">Edit</a>
                                    <form method="POST" action="{{ route('borrow.destroy', $borrow->id) }}"
                                        onsubmit="return false;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDeleteModal(this.closest('form'))"
                                            class="text-xs bg-red-50 hover:bg-red-100 text-red-600 px-3 py-1.5 rounded-md transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($borrows->isEmpty())
                <div class="text-center py-16 text-slate-400">
                    <p class="text-lg">No borrow records found</p>
                    <p class="text-sm mt-1">Add a new borrow record to get started</p>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $borrows->links() }}
        </div>
    </div>

    <script>
        const alert = document.getElementById('successAlert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        }
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
