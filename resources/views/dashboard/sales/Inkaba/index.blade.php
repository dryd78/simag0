@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div>
      <a href="/dashboard/sales/inkaba/create" class="btn btn-primary btn-sm mb-3">New Sales Report</a>
      <a href="/dashboard/details/inkaba" class="btn btn-warning btn-sm mb-3">Dashboard</a>
    </div>
    <h6 class="text-muted">Welcome, @Inkaba Sales Dashboard | 
        <div class="btn btn-secondary btn-sm">
          {{ auth()->user()->name }}
        </div>
    </h6>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>  
@endif

<div class="col-lg-6 panel panel-heading mb-3">
    <form action="/dashboard/sales/inkaba" method="get">
        @csrf
            From: <input type="date" name="fromDate" class="" value="{{ date('Y-m-01') }}">
            To: <input type="date" name="toDate" class="" value="{{ date('Y-m-t') }}">
            {{-- Branch: <input type="text" name="search" class="" value="">  --}}
            <button type="submit" name="search" class="btn btn-success btn-sm">Refresh</button>
    </form>
</div>

<div class="table-responsive col-lg-12">
  <table class="table table-striped table-bordered table-sm bg-light">
    <thead>
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">Invoice Date</th>
        <th scope="col" class="text-center">Branch</th>
        <th scope="col" class="text-center">Product Name</th>
        <th scope="col" class="text-center">UoM</th>
        <th scope="col" class="text-center">Quantity</th>
        <th scope="col" class="text-center">Net Sales</th>
      </tr>
    </thead>
    <tbody>
      @if($sales->count())
      @foreach ($sales as $sale)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $sale->invoice_date }}</td>
          <td>{{ $sale->branch_name }}</td>
          <td>{{ $sale->product_name }}</td>
          <td class="text-center">{{ $sale->uom }}</td>
          <td class="text-end px-3">{{ number_format($sale->quantity, 2) }}</td>
          <td class="text-end px-3">{{ number_format($sale->total_sales, 2) }}</td>
          <td class="text-center">
            <form action="/dashboard/sales/inkaba/{{ $sale->id }}" method="post" class="d-inline">
                @method('delete')
                    @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure, want to delete?!')"><span data-feather="x-circle"></span></button>
            </form>
        </td>
        </tr>
      @endforeach

      @else
        <td><b>No record found.</b></td>
      @endif

      <tr>
        <th scope="col" class="text-center"></th>
        <th scope="col" class="text-center"></th>
        <th scope="col" class="text-center"></th>
        <th scope="col" class="text-center"></th>
        <th scope="col" class="text-center"></th>
        <th scope="col" class="text-center"></th>
        <th scope="col" class="text-end px-3">{{ number_format($sales->sum('total_sales'), 2) }}</th>
      </tr>
    </tbody>
  </table>

</div>

@endsection