<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Index Books</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>author</th>
            <th>price</th>
            <th>category</th>
            <th>image</th>
            <th>Actions</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id ?? 'N/A' }}</td>
                <td>{{ $book->title ?? 'N/A' }}</td>
                <td>{{ $book->author ?? 'N/A' }}</td>
                <td>{{ $book->price ?? 'N/A' }}</td>
                <td>{{ $book->category ?? 'N/A' }}</td>
                <td>{{ $book->image ?? 'N/A' }}</td>
                <td>
                    <div>
                        <a href="{{ route('book.edit', ['book' => $book]) }}">Edit</a>
                        <a href="{{ route('book.show', ['book' => $book]) }}">Show</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
