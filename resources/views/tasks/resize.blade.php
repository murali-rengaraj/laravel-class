@extends('products/layouts/home')

@section("title",'Resize')

@section("head",'Resize Images')

@section("content")
<div class="create w-50">
    <a href="{{ url('/') }}">
        <button class="btn btn-warning">Home</button>
    </a>
    <form action="{{ url('/tasks/imageResize') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="img" class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="img">
        <br>
        <input type="submit" value="Insert" class="btn btn-primary form-control">
    </form>
</div>
@endsection