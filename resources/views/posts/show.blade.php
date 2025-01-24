<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @if(session("delete"))
    <p style="color:red">{{ session("delete") }}</p>
    @endif


    <div class="container w-50 mt-5">
        <h1 class="text-center">Informations</h1>
        <a href="{{ route('posts.create') }}">Add</a>
        <table class="table table-hover">
            <tr class="table-danger">
                <th>S/No</th>
                <th>Title</th>
                <th>Content</th>
                <th colspan="2">Actions</th>
            </tr>
            @foreach($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->title }}</td>
                <td>{{ $d->content }}</td>
                <td><a href="{{ url('posts/'.$d->id.'/edit') }}">Edit</a></td>
                <!-- <td><a href="{{ url('posts/'.$d->id.'/destroy') }}">Delete</a></td> -->
                <td>
                    <form action="{{ url('posts/'.$d->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>