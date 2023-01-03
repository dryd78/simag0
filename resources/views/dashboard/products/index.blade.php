@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3 pt-3 pb-2">
    <h4 class="text-muted">Products List</h4>
    <h6 class="text-muted">Welcome, @Administrator Dashboard -> Products | 
        <div class="btn btn-secondary btn-sm">
            {{ auth()->user()->name }}
        </div>
    </h6>
</div>

<div class="col-lg-6 panel panel-heading mb-3">
  <form action="/dashboard/products" method="GET">
      @csrf
      Product Name: <input type="text" name="keyword" placeholder="Product name.."> 
      <button type="submit" name="search" class="btn btn-success btn-sm">Refresh</button>
  </form>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>  
@endif

<div class="col-lg-12">
    <table class="table table-responsive table-bordered table-striped table-sm bg-light">   
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Product ID</th>
                <th class="text-center" scope="col">Product Name</th>
                <th class="text-center" scope="col">Category</th>
                <th class="text-center" scope="col">UoM</th>
                <th class="text-center" scope="col">Description</th>
                <th class="text-center" scope="col">Unit Cost Price</th>
                <th class="text-center" scope="col">Unit Price</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($products->count())
                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td class="text-center">{{ $product->category }}</td>
                        <td class="text-center">{{ $product->uom }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td class="text-end px-3">{{ number_format($product->unit_cost_price, 2) }}</td>
                        <td class="text-end px-3">{{ number_format($product->unit_price, 2) }}</td>
                        <td class="text-center">
                            <a href="/dashboard/products/{{ $product->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/dashboard/products/{{ $product->id }}" method="post" class="d-inline">
                                @method('delete')
                                    @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure, want to delete?!')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <td class="text-center"><b></b></td>
                <td class="text-center"><b></b></td>
                <td class="text-center"><b>No product found.</b></td>
            @endif
        </tbody>
    </table>

    <a href="/dashboard/products/create" class="btn btn-success btn-sm">Add Product</a>

</div>

@endsection