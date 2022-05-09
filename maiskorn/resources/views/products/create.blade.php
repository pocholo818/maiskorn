@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add Product</h1>

    <a href="{{ route('products.index') }}" class="btn btn-success btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i>Go Back
    </a>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems in your input. <br><br>
        
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <label>Product Code</label>
            <input type="text" name="code" class="form-control" maxlength="5" placeholder="Enter Product Code">
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea name="desc" class="form-control" placeholder="Product Description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" name="price" step="any" class="form-control" placeholder="Enter Product Price">
        </div>
        <br>
        
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
@endsection