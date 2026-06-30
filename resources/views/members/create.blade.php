<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Create Members:</h1>

    <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="Name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Name..." value="{{ old('name') }}">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="Email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email..." value="{{ old('email') }}">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="price" placeholder="Phone..." value="{{ old('phone') }}">
            @error('phone')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" placeholder="category" value="{{ old('category') }}">
            @error('category')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="photo">Upload the Image:</label>
            <input type="file" name="photo" id="photo">
            @error('photo')
                {{ $message }}
            @enderror
        </div>
        <br>

        <input type="submit" value="Submit The Form">

    </form>

</body>

</html>
