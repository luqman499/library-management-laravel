<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Records</title>
</head>

<body>
    <h1>Borrow Records</h1>

    <a href="{{ route('borrow.create') }}">Add New Borrow</a>

    @if (session()->has('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Book</th>
            <th>Member</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
            <th>Actions</th>
        </tr>
        @foreach ($borrows as $borrow)
            <tr>
                <td>{{ $borrow->id }}</td>
                <td>{{ $borrow->book->title }}</td>
                <td>{{ $borrow->member->name }}</td>
                <td>{{ $borrow->borrow_date }}</td>
                <td>{{ $borrow->return_date ?? 'Not Returned' }}</td>
                <td>
                    <a href="{{ route('borrow.edit', $borrow->id) }}">Edit</a>
                    <form method="POST" action="{{ route('borrow.destroy', $borrow->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
