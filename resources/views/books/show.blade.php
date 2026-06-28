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
        <p>{{ $book->id }}</p>
    </div>
    <br>
    <div>
        <h2>Title:</h2>
        <p>{{ $book->title }}</p>
    </div>
    <br>
    <div>
        <h2>Author:</h2>
        <p>{{ $book->author }}</p>
    </div>
    <br>
    <div>
        <h2>Price</h2>
        <p>{{ $book->price }}</p>
    </div>
    <br>
    <div>
        <h2>Category:</h2>
        <p>{{ $book->category }}</p>
    </div>
    <br>
</body>

</html>
