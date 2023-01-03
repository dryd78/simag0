@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3 pt-3 pb-2">
  <a href="/dashboard/products" class="btn btn-warning btn-sm">Cancel</a>
  <h6 class="text-muted">Welcome, @Administrator Dashboard -> Products Edit | 
    <div class="btn btn-secondary btn-sm">
      {{ auth()->user()->name }}
    </div>
  </h6>
</div>

    <div class="col-lg-4">
        <form method="post" class="row g-3" action="/dashboard/products/{{ $product->id }}" enctype="multipart/form-data">
        @method('put')
          @csrf
            <div class="col-lg-6">
              <label for="product_name" class="form-label">Product Name</label>
              <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" required autofocus value="{{ old('product_name', $product->product_name) }}">
              @error('product_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-lg-6">
              <label for="category" class="form-label">Category</label>
              <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" required autofocus value="{{ old('category', $product->category) }}">
              @error('category')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-lg-3">
              <label for="uom" class="form-label">UoM</label>
              <input type="text" class="form-control @error('uom') is-invalid @enderror" id="uom" name="uom" required autofocus value="{{ old('uom', $product->uom) }}">
              @error('uom')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-lg-12">
              <label for="product_description" class="form-label">Product description</label>
              <input type="text" class="form-control @error('product_description') is-invalid @enderror" id="product_description" name="product_description" required autofocus value="{{ old('product_description', $product->product_description) }}">
              @error('product_description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-lg-6">
              <label for="unit_cost_price" class="form-label">Unit Cost</label>
              <input type="text" class="form-control @error('unit_cost_price') is-invalid @enderror" id="unit_cost_price" name="unit_cost_price" required autofocus value="{{ old('unit_cost_price', $product->unit_cost_price) }}">
              @error('unit_cost_price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-lg-6">
              <label for="unit_price" class="form-label">Unit Price</label>
              <input type="text" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price" name="unit_price" required autofocus value="{{ old('unit_price', $product->unit_price) }}">
              @error('unit_price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div>
              <button type="submit" class="btn btn-primary btn-sm my-3">Update</button>
            </div>

        </form>
    </div>

@endsection

