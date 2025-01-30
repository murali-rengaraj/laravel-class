@extends('products/layouts/home')

@section("title",'Insert')

@section("head",'Insert New Product')

@section("content")
<div class="create w-50">
    <a href="{{ url('/') }}">
        <button class="btn btn-warning">Home</button>
    </a>
    {{-- 
        @if ($errors->any())
    @foreach ($errors->all() as $e)
        <div class="alert-sm">
            <p class="alert-danger">{{ $e }}</p>
        </div>
    @endforeach
    @endif 
    --}}
    <form action="{{ url('/products/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        @error('name')
            <p class="alert-sm alert-danger mb-0">{{ $errors->first('name') }}</p>
        @enderror

        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" value="{{ old('price') }}">
        @if($errors->has("price"))
        <p class="alert-sm alert-danger mb-0">{{ $errors->first('price') }}</p>
        @endif

        <label for="desc" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc" value="{{ old('desc') }}">
        @error('desc')
        <p class="alert-sm alert-danger mb-0">{{ $errors->first('desc') }}</p>
        @enderror

        <label for="img" class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="img">
        @if ($errors->has('img'))
        <p class="alert-sm alert-danger mb-0">{{ $errors->first('img') }}</p>
        @endif

        <br>
        <input type="submit" value="Insert" class="btn btn-primary form-control">
    </form>
</div>
@endsection