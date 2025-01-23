<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <!-- <h1>Hello</h1> -->
    <h1>{{-- $data->id --}}</h1>

    <div class="container w-25 mt-5">
    <form action="{{ url('posts/'.$data->id.'/update') }}" method="post" class="border p-1">
            @csrf
            @method("PUT")
            <div>
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" required class="form-control" value="{{ $data->title }}">
            </div>
            <div>
                <label for="content" class="form-label">Content:</label>
                <textarea name="content" id="content" required class="form-control">{{ $data->content}}</textarea>
            </div><br>
            <button type="submit" class="form-control btn btn-success">Edit</button>

    </form>
    </div>
</body>
</html>