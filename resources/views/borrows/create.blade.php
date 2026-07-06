<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Borrow Record</title>
</head>

<body>
    <h1>Add Borrow Record</h1>

    <a href="{{ route('borrow.index') }}">Back to List</a>

    <form method="POST" action="{{ route('borrow.store') }}">
        @csrf

        <div>
            <label>Book:</label>
            <select name="book_id">
                <option value="">-- Select Book --</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book_id')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Member:</label>
            <select name="member_id">
                <option value="">-- Select Member --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
            @error('member_id')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Borrow Date:</label>
            <input type="date" name="borrow_date">
            @error('borrow_date')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Return Date:</label>
            <input type="date" name="return_date">
            @error('return_date')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Save</button>

    </form>

</body>

</html>
