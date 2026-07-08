<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Borrow Record</title>
</head>

<body>
    <h1>Return Book</h1>

    <a href="{{ route('borrow.index') }}">Back to List</a>

    <br><br>

    <p><strong>Book:</strong> {{ $borrow->book->title }}</p>
    <p><strong>Member:</strong> {{ $borrow->member->name }}</p>
    <p><strong>Borrow Date:</strong> {{ $borrow->borrow_date }}</p>
    <p><strong>Returned Date:</strong> {{ $borrow->return_date }}</p>
    <br>

</body>

</html>
