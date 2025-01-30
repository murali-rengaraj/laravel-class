@extends('products.layouts.home')

@section('title','Edit')

@section('head','Edit Product')

@section('content')
<div class="edit">
    @if ($errors->any())
        @foreach ($errors->all() as $e)
        <p class="alert-sm alert-danger">{{ $e }}</p>
        @endforeach
    @endif
    <form action="{{ url('/products/edit') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" class="form-control" name="id" value="{{ $result->id }}"> 

        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name',$result->name) }}"> 
        @error('name')
            <p class="alert-sm alert-danger">{{ $errors->first('name') }}</p>
        @enderror

        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" value="{{ $result->price }}">

        <label for="desc" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc" value="{{ $result->description }}">

        <label for="img" class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="img">
        {{-- {{ $result->image_name }} --}}
        <p>Previous Image: </p> <img src="{{ asset('/productImages/'. $result->image_name) }}" alt="previous Image" width="50" height="50">
        <br>
        <input type="submit" value="Update" class="btn btn-primary form-control">
    </form>
</div>
@endsection