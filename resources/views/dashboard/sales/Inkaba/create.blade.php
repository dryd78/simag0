@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <a href="/dashboard/sales/inkaba" class="btn btn-warning btn-sm">Cancel</a>
  <h6 class="text-muted">Welcome, @Inkaba Sales Dashboard->Sales Input | 
    <div class="btn btn-secondary btn-sm">
      {{ auth()->user()->name }}
    </div>
  </h6>
</div>

  <div class="col-lg-8">
      <form method="post" action="/dashboard/sales/inkaba" class="mb-5">
        @csrf
        <div class="col-lg-3 mb-3">
          <label for="invoice_date" class="form-label">Invoice Date</label>
          <input type="date" class="form-control @error('invoice_date') is-invalid @enderror" id="invoice_date" name="invoice_date" required autofocus value="{{ old('invoice_date') }}">
            @error('invoice_date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        
        <div class="col-lg-4 mb-3">
          <label for="branch_name" class="form-label">Branch</label>
            <select class="form-select" name="branch_name" id="">
              @foreach ($branches as $branch)
                  @if(old('branch_name') == $branch->id)
                    <option value="{{ $branch->branch_name }}" selected>{{ $branch->branch_name }}</option>
                  @else
                    <option value="{{ $branch->branch_name }}">{{ $branch->branch_name }}</option>
                  @endif
                @endforeach
            </select>
            @error('branch')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-lg-6 mb-3">
          <label for="product_name" class="form-label">Product Name</label>
            <select class="form-select" name="product_name" id="">
              @foreach ($products as $product)
                  @if(old('product_name') == $product->id)
                    <option value="{{ $product->product_name }}" selected>{{ $product->product_name }}</option>
                  @else
                    <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                  @endif
                @endforeach
            </select>
            @error('product_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-lg-2 mb-3">
          <label for="uom" class="form-label">UoM</label>
            <select class="form-select" name="uom" id="">
              @foreach ($products as $product)
                  @if(old('uom') == $product->id)
                    <option value="{{ $product->uom }}" selected>{{ $product->uom }}</option>
                  @else
                    <option value="{{ $product->uom }}">{{ $product->uom}}</option>
                  @endif
                @endforeach
            </select>
            @error('uom')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        
        <div class="col-lg-3 mb-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="double" onchange="hitung()" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required value="{{ old('quantity') }}">
            @error('quantity')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        
        <div class="col-lg-3 mb-3">
          <label for="unit_price" class="form-label">Unit Price</label>
          <input type="double" onchange="hitung()" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price" name="unit_price" required value="{{ old('unit_price') }}">
            @error('unit_price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-lg-3 mb-3">
          <label for="total_sales" class="form-label">Total Sales</label>
          <input type="double" class="form-control @error('total_sales') is-invalid @enderror" id="total_sales" name="total_sales" required>
            @error('total_sales')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Save</button>
      </form>

  </div>

  <script>
    function hitung(){
      var qty=document.getElementById("quantity").value;
      var price=document.getElementById("unit_price").value;
      var result=parseInt(qty)*parseInt(price);

      document.getElementById("total_sales").value=result;
    }

  </script>
 

@endsection