<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document - @yield('title','10')</title>
</head>

<body>
    @php    
        echo "hi";
    @endphp
    
    
    @yield('hii')

    {{-- @if(strlen($d1)>1) --}}
    <h1>Hello @yield('content')</h1>
    <?php echo "php" ?>

    <h1>Bye</h1>

</body>

</html>