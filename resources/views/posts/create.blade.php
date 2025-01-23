<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container w-25 mt-5">
        @if(session('success'))
        <p style="color: greenyellow;">{{ session('success') }}</p>
        @endif
        <form action="{{ route('posts.store') }}" method="POST" class="border p-1">
            @csrf
            <div>
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" required class="form-control">
            </div>
            <div>
                <label for="content" class="form-label">Content:</label>
                <textarea name="content" id="content" required class="form-control"></textarea>
            </div><br>
            <button type="submit" class="form-control btn btn-success">Create Post</button>
        </form>
    </div>
</body>

</html>