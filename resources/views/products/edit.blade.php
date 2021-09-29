@extends('layouts.app')

@section('content')

<h1>Edit Product</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
    </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf
        @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price (RM):</strong>
                <input type="number" step="any" name="price" class="form-control" placeholder="99.99" value="{{ $product->price }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                <textarea class="form-control" style="height:150px" name="details" placeholder="Detail">{{ $product->details }}</textarea>
            </div>
        </div>

        <strong>Publish:</strong>
        <div class="form-check">
            <input type="radio" class="form-check-input" value="yes" id="yes" name="publish" value="{{ $product->publish }}">
        <label for="yes" class="form-check-label">Yes</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" value="no" id="no" name="publish" value="{{ $product->publish }}">
        <label for="no" class="form-check-label">No</label>
        </div>

        <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Update</button>
        </div>
    </div>

</form>

@endsection
