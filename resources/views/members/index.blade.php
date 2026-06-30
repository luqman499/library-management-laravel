<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Index Members</h1>
    <button> <a href="{{ route('member.create') }}">Creat a New Member</a></button>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>address</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->id ?? 'N/A' }}</td>
                <td>{{ $member->name ?? 'N/A' }}</td>
                <td>{{ $member->email ?? 'N/A' }}</td>
                <td>{{ $member->phone ?? 'N/A' }}</td>
                <td>{{ $member->address ?? 'N/A' }}</td>
                <td><img src="{{ asset('uploads/members/' . $member->photo) }}" alt="{{ $member->name }}" width="100px">
                </td>
                <td>
                    <div>
                        <a href="{{ route('member.edit', ['member' => $member]) }}">Edit</a>
                        <a href="{{ route('member.show', ['member' => $member]) }}">Show</a>
                        <form method="POST" action="{{ route('member.destroy', ['member' => $member]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
