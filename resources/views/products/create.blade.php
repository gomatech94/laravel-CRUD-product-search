@extends('layouts.app')

@section('content')

<h1>Add New Product</h1>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price (RM):</strong>
                <input type="number" step="any" name="price" class="form-control" placeholder="99.99">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                <textarea class="form-control" style="height:150px" name="details" placeholder="Detail"></textarea>
            </div>
        </div>

        <strong>Publish:</strong>
        <div class="form-check">
            <input type="radio" class="form-check-input" value="yes" id="yes" name="publish" value="option1">
        <label for="yes" class="form-check-label">Yes</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" value="no" id="no" name="publish" value="option2">
        <label for="no" class="form-check-label">No</label>
        </div>

        <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Submit</button>
        </div>
    </div>

</form>

    {{-- <form action="{{ route('products.store') }}" method="post">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" class="form-control mb-3" placeholder="Name"/>
        <label>Price (RM):</label>
        <input type="number" name="price" class="form-control mb-3" placeholder="99.99"/>
        <label>Details:</label>
        <textarea name="details" class="form-control mb-3" rows="3" placeholder="Details"></textarea>
        <label>Publish:</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" value="yes" id="yes" name="publish" value="option1">
        <label for="yes" class="form-check-label">Yes</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" value="no" id="no" name="publish" value="option2">
        <label for="no" class="form-check-label">No</label>
        </div>
        <div class="text-center">
        <button class="btn btn-primary px-5" type="submit">Submit</button>
        </div>
    </form> --}}
    @endsection
