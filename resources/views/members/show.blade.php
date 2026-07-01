<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Show File</h1>
    <div>
        <h2>ID:</h2>
        <p>{{ $member->id }}</p>
    </div>
    <br>
    <div>
        <h2>name:</h2>
        <p>{{ $member->name }}</p>
    </div>
    <br>
    <div>
        <h2>Email:</h2>
        <p>{{ $book->email }}</p>
    </div>
    <br>
    <div>
        <h2>Phone:</h2>
        <p>{{ $book->phone }}</p>
    </div>
    <br>
    <div>
        <h2>Address:</h2>
        <p>{{ $book->address }}</p>
    </div>
    <div>
        <h2>Photo:</h2>
        <img src="{{ asset('uploads/members/' . $book->image) }}" alt="{{ $book->name }}" width="100px">
    </div>
    <br>
</body>

</html>
