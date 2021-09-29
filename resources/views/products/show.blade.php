@extends('layouts.app')


@section('content')
    <h1>Show Products</h1>
    <hr/>

    <div class="bg-dark text-white rounded p-3">
        <h5 class="text-warning">No:</h5>
        <p class="fw-bold">{{ $product->id }}</p>

        <h5 class="text-warning">Name:</h5>
        <p class="fw-bold">{{ $product->name }}</p>

        <h5 class="text-warning">Price:</h5>
        <p class="fw-bold">RM{{ $product->price }}</p>

        <h5 class="text-warning">Details:</h5>
        <p class="fw-bold">{{ $product->details }}</p>

        <h5 class="text-warning">Publish:</h5>
        <p class="fw-bold">{{ $product->publish }}</p>
    </div>

@endsection
