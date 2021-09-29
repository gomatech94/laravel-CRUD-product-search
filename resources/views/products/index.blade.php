@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Laravel Test</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            <form action="{{ route('products.index') }}" method="GET" role="search">

                <div class="input-group">
                    <input type="text" name="term" placeholder="Search products" id="term">
                    <a href="{{ route('products.index') }}" class=" mt-1">
                    <button class="btn btn-info" type="submit">Search</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Display pop-up message -->
@if (session('success'))
    <div class="alert alert-sucess">
        {{ session('success') }}
    </div>

@endif

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Price(RM)</th>
            <th scope="col">Details</th>
            <th scope="col">Publish</th>
            <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
            <td>RM{{ $product->price }}</td>
            <td>{{ $product->details }}</td>
            <td>{{ $product->publish }}</td>
        <td>

            {{-- href="{{ route('products.show',$product->id) }}" --}}
            <a href="{{ route('products.show',$product->id) }}"class="btn btn-info" >Show</a>

            {{-- href="{{ route('products.edit',$product->id) }}" --}}
            <a href="{{ route('products.edit',$product->id) }}"class="btn btn-primary">Edit</a>

            {{-- action="{{ route('products.destroy',$product->id) }}" --}}
            <form action="{{ route('products.destroy',$product->id) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

    @endsection
