<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books — Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
        <span class="text-lg font-semibold text-slate-800 tracking-tight">📚 Library Management</span>
        <div class="flex gap-6 text-sm font-medium text-slate-500">
            <a href="{{ route('book.index') }}" class="text-indigo-600 border-b-2 border-indigo-600 pb-0.5">Books</a>
            <a href="{{ route('member.index') }}" class="hover:text-slate-800 transition">Members</a>
            <a href="{{ route('borrow.index') }}" class="hover:text-slate-800 transition">Borrow Records</a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Books</h1>
                <p class="text-sm text-slate-500 mt-1">Manage your library book collection</p>
            </div>
            <a href="{{ route('book.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                + Add Book
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">ID</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Cover</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Title</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Author</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Category</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Price</th>
                        <th class="text-left px-5 py-3 text-slate-500 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($books as $book)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-5 py-3 text-slate-400">{{ $book->id }}</td>
                        <td class="px-5 py-3">
                            @if ($book->image)
                                <img src="{{ asset('uploads/books/' . $book->image) }}"
                                     alt="{{ $book->title }}"
                                     class="w-10 h-14 object-cover rounded shadow-sm">
                            @else
                                <div class="w-10 h-14 bg-slate-100 rounded flex items-center justify-center text-slate-300 text-xs">N/A</div>
                            @endif
                        </td>
                        <td class="px-5 py-3 font-medium text-slate-800">{{ $book->title }}</td>
                        <td class="px-5 py-3 text-slate-600">{{ $book->author }}</td>
                        <td class="px-5 py-3">
                            <span class="bg-indigo-50 text-indigo-600 text-xs font-medium px-2 py-1 rounded-full">
                                {{ $book->category }}
                            </span>
                        </td>
                        <td class="px-5 py-3 text-slate-700">Rs. {{ $book->price }}</td>
                        <td class="px-5 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('book.show', ['book' => $book]) }}"
                                   class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded-md transition">
                                   View
                                </a>
                                <a href="{{ route('book.edit', ['book' => $book]) }}"
                                   class="text-xs bg-amber-50 hover:bg-amber-100 text-amber-700 px-3 py-1.5 rounded-md transition">
                                   Edit
                                </a>
                                <form method="POST" action="{{ route('book.destroy', ['book' => $book]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Delete this book?')"
                                            class="text-xs bg-red-50 hover:bg-red-100 text-red-600 px-3 py-1.5 rounded-md transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($books->isEmpty())
                <div class="text-center py-16 text-slate-400">
                    <p class="text-lg">No books found</p>
                    <p class="text-sm mt-1">Add your first book to get started</p>
                </div>
            @endif
        </div>
    </div>

</body>
</html>
