@extends('products/layouts/home')

@section("title",'Insert')

@section("head",'Insert New Product')

@section("content")
<div class="create w-50">
    <a href="{{ url('/') }}">
        <button class="btn btn-warning">Home</button>
    </a>
    <form action="{{ url('/products/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name">

        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price">

        <label for="desc" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc">

        <label for="img" class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="img">
        <br>
        <input type="submit" value="Insert" class="btn btn-primary form-control">
    </form>
</div>
@endsection