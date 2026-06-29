<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Books</h1>

    <form method="POST" action="{{ route('book.update', ['book' => $book]) }} " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="Title">Title:</label>
            <input type="text" name="title" id="title" placeholder="title" value="{{ $book->title }}">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" placeholder="author" value="{{ $book->author }}">
            @error('author')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" placeholder="price" value="{{ $book->price }}">
            @error('price')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" placeholder="category" value="{{ $book->category }}">
            @error('category')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="image">Upload the Image:</label>
            <input type="file" name="image" id="image">
            <img src="{{ asset('uploads/books/' . $book->image) }}" width="100px" height="170px">
            @error('image')
                {{ $message }}
            @enderror
        </div>
        <br>

        <input type="submit" value="Update The Form">
    </form>

</body>

</html>
