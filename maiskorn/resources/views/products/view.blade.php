@extends('layouts.app')

@section('content')
<div class="mk-form">
    <h1 class="text-center">Product Information</h1>

    <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i>Go Back
    </a><br><br>

    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" value="{{ $product->name }}" readonly class="form-control" placeholder="Enter Product Name">
    </div>
    <div class="form-group">
        <label>Product Code</label>
        <input type="text" name="code" value="{{ $product->code }}" readonly class="form-control" maxlength="5" placeholder="Enter Product Code">
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <textarea name="desc" value="{{ $product->desc }}" readonly class="form-control" placeholder="Product Description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label>Product Price</label>
        <input type="number" name="price" value="{{ $product->price }}" readonly step="any" class="form-control" placeholder="Enter Product Price">
    </div>
    <br>
</div>
        
@endsection