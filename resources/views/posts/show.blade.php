<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50 mt-5">
        <h1 class="text-center">Informations</h1>
    <table class="table table-hover">
        <tr class="table-danger">
            <th>Title</th>
            <th>Content</th>
        </tr>
        @foreach($data as $d)
            <tr>
                <td>{{ $d->title }}</td>
                <td>{{ $d->content }}</td>
            </tr>
        @endforeach
    </table>
    </div>
</body>
</html>