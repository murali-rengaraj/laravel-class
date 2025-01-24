<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - @yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid m-0 p-0">
        <div class="nav navbar bg-dark">
            <h1 class="navbar-header text-warning">Amazon</h1>
        </div>
        <div class="container">            
            <h1 class="text-center text-info">@yield("head")</h1>            
            <div class="d-flex flex-column justify-content-center align-items-center">
            @if(session("success"))
            <div class="w-50" id="success-message">
                <p class="alert-sm alert-success w-100 text-center">{{ session("success") }}</p>
            </div>
            @endif
                @yield("content")
            </div>
        </div>
    </div>
    <script>
        window.onload=setTimeout(() => {
            document.getElementById('success-message').style.display='none';
        }, 3000);
    </script>
</body>

</html>