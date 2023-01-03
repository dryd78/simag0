@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3 pt-3 pb-2">
    <h4 class="text-muted">Add New Product</h4>
    <h6 class="text-muted">Welcome, @Administrator Dashboard -> Products | 
        <div class="btn btn-secondary btn-sm">
            {{ auth()->user()->name }}
        </div>
    </h6>
</div>

<div class="col-lg-12">
    <form method="post" class="row g-3" action="/dashboard/products" enctype="multipart/form-data">
        @csrf
            <div class="col-lg-2">
                <label for="product_name" class="form-label">Product ID</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_id" name="product_id"  value="{{ $product_id }}" readonly>
                    @error('product_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            <div class="col-lg-5">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" required autofocus value="{{ old('product_name') }}">
                    @error('product_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            <div class="col-lg-4">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" required autofocus value="{{ old('category') }}">
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            <div class="col-lg-1">
                <label for="uom" class="form-label">UoM</label>
                    <input type="text" class="form-control @error('uom') is-invalid @enderror" id="uom" name="uom" required autofocus value="{{ old('uom') }}">
                        @error('uom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
            </div>
            
            <div class="col-lg-12">
                <label for="product_description" class="form-label">Product description</label>
                    <input type="text" class="form-control @error('product_description') is-invalid @enderror" id="product_description" name="product_description" required autofocus value="{{ old('product_description') }}">
                        @error('product_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
            </div>
            
            <div class="col-lg-3">
                <label for="unit_cost_price" class="form-label">Unit Cost</label>
                    <input type="text" class="form-control @error('unit_cost_price') is-invalid @enderror" id="unit_cost_price" name="unit_cost_price" required autofocus value="{{ old('unit_cost_price') }}">
                        @error('unit_cost_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
            </div>
            
            <div class="col-lg-3">
                <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="text" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price" name="unit_price" required autofocus value="{{ old('unit_price') }}">
                        @error('unit_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
            </div>
            
            <div>
                <a href="/dashboard/products" class="btn btn-warning btn-md">Cancel</a>
                <button type="submit" class="btn btn-primary btn-md my-3">Add</button>
            </div>
        </form>
    </div>

@endsection

