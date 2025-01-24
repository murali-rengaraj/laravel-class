@extends('products.layouts.home')

@section("title","All")

@section("head","All Products")

@section("content")

<div class="index w-75">
    <caption>
        <a href="{{ url('/tasks/imageResize') }}" class="float-start mb-1">
            <button class="btn btn-success">Image Resize Task</button>
        </a>
        <a href="{{ url('/products/create') }}" class="float-end mb-1">
            <button class="btn btn-success">Add Product</button>
        </a>
    </caption>
    <table class="table table-hover">
        <tr class="table-danger">
            <th>S/N</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image Name</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach($result as $r)
        <tr class="table-primary">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->name }}</td>
            <td>{{ $r->price }}</td>
            <td>{{ $r->description }}</td>
            <td>{{ $r->image_name }}</td>
            <td><a href="{{ url('products/edit/'. $r->id) }}">
                    <button class="btn-sm btn-info border-0">
                        Edit
                    </button>
                </a></td>
            <td>
                <form action="{{ url('products/destroy') }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn-sm btn-danger border-0" value="{{ $r->id }}" name="id">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection