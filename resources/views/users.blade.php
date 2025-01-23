<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>All Users</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
        </tr>
        @foreach ($user as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->username }}</td>
            </tr>
        @endforeach
        {{-- $user->links() --}}
    </table>
</body>
</html>