@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom mb-3">
    <a href="/dashboard" class="btn btn-warning btn-sm"><span data-feather="home"></span> Main Dashboard</a>
    <h6 class="text-muted">Welcome, @Inkaba Dashboard | 
      <div class="btn btn-secondary btn-sm">
        {{ auth()->user()->name }}
      </div>
    </h6>
  </div>

  <div class="row mb-3">
    <div class="col-xl-4 panel panel-heading">
      <form action="/dashboard/details/inkaba">
          @csrf
          From: <input type="date" name="fromDate" class="" value="{{ date('Y-m-01') }}">
          To: <input type="date" name="toDate" class="" value="{{ date('Y-m-t') }}">
          <button type="submit" name="search" class="btn btn-success btn-sm">Show</button>
      </form>
    </div>
  </div>

  <div class="row">
      <div class="col-xl-4 col-lg-6">
        <div class="card bg-primary text-white mb-4">
          <div class="card-body">
              <div><h4>{{ number_format($sales->sum('total_sales'), 2) }}</h4></div>
              <div class="">Total Pendapatan</div>
          </div>
        </div> 
      </div>
      <div class="col-xl-4 col-lg-6">
        <div class="card bg-primary text-white mb-4">
          <div class="card-body">
              <div><h2>Info..</h2></div>
              <div class="text-muted">Info..</div>
          </div>
        </div> 
      </div>
      <div class="col-xl-4 col-lg-6">
        <div class="card bg-primary text-white mb-4">
          <div class="card-body">
              <div><h2>Info..</h2></div>
              <div class="text-muted">Info..</div>
          </div>
        </div> 
      </div>
  </div>

  <div class="row">
    <div class="table-responsive col-lg-12">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Date</th>
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
              <td>{{ $sale->product_name }}</td>
              <td class="text-center">{{ $sale->uom }}</td>
              <td class="text-end px-3">{{ number_format($sale->quantity, 2) }}</td>
              <td class="text-end px-3">{{ number_format($sale->total_sales, 2) }}</td>
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
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 border">
      Graphic View3
    </div>
    
    <div class="col-lg-6 border">
      <div class="row border">
        <table class="table table-striped table-sm">
          <thead>
            <small class="text-muted mb-1">sort by: Education</small>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Education Level</th>
              <th scope="col">SUM</th>
              <th scope="col">%</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>#</td>
                <td>Komposisi</td>
                <td>Jumlah</td>
                <td>Prosentase</td>
            </tr>
          </tbody>
        </table>

      </div>
      <div class="row border">
        2nd Table

      </div>
      <div class="row border">
        3rd Table
      </div>
    </div>
  </div>
@endsection