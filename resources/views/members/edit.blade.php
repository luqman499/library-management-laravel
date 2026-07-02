<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Update Members:</h1>

    <form method="POST" action="{{ route('member.update', ['member' => $member]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="Name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Name..." value="{{ $member->name }}">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="Email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email..." value="{{ $member->email }}">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" placeholder="Phone..." value="{{ $member->phone }}">
            @error('phone')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="address">Category:</label>
            <input type="text" name="address" id="address" placeholder="address" value="{{ $member->address }}">
            @error('address')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="photo">Upload the Image:</label>
            <input type="file" name="photo" id="photo">
            <img src="{{ asset('uploads/members/' . $member->photo) }}" width="100px" height="170px">
            @error('photo')
                {{ $message }}
            @enderror
        </div>
        <br>

        <input type="submit" value="Update The Form">

    </form>

</body>

</html>
