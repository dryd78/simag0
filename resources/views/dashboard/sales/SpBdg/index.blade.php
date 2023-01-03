@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div>
        <a href="/dashboard/details/SpBdg" class="btn btn-warning btn-sm mb-3">Dashboard</a>
        <a href="/dashboard/sales/SpBdg/create" class="btn btn-primary btn-sm mb-3">New Sales Report</a>
    </div>
    <h6 class="text-muted">Welcome, @Saripetojo Bandung Sales Dashboard | 
        <div class="btn btn-secondary btn-sm">
            {{ auth()->user()->name }}
        </div>
    </h6>
</div>


<div class="col-lg-6 panel panel-heading mb-3">
    <form action="/dashboard/sales/SpBdg" method="GET">
        @csrf
        From: <input type="date" name="fromDate" class="" value="{{ date('Y-m-01') }}">
        To: <input type="date" name="toDate" class="" value="{{ date('Y-m-t') }}">
        Product: <input type="text" name="keyword" placeholder="Product name.."> 
        <button type="submit" name="search" class="btn btn-success btn-sm">Refresh</button>
    </form>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>  
@endif
<div class="table-responsive">
    <table class="table table- responsive table-bordered table-striped table-sm bg-light">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Invoice Date</th>
                <th class="text-center">Invoice Number</th>
                <th class="text-center">Branch</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">UoM</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Net Sales</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if($sales->count())
                @foreach ($sales as $sale)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td class="text-center">{{ date("d-M-y", strtotime($sale['invoice_date'])) }}</td>
                        <td class="text-center">{{ $sale->invoice_number }}</td>
                        <td class="text-center">{{ $sale->branch_name }}</td>
                        <td class="text-center">{{ $sale->product_name }}</td>
                        <td class="text-center">{{ $sale->uom }}</td>
                        <td class="text-end px-3">{{ number_format($sale->quantity, 0) }}</td>
                        <td class="text-end px-3">{{ number_format($sale->total_sales, 0) }}</td>
                        <td class="text-center">
                            <form action="/dashboard/sales/SpBdg/{{ $sale->id }}" method="post" class="d-inline">
                                @method('delete')
                                    @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure, want to delete?!')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <td class="text-center"><b></b></td>
                <td class="text-center"><b>No record found.</b></td>
            @endif
      
            <tr>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-center">
                    <div>Sub Total</div>
                    <div>TOTAL</div>
                </th>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-end px-3">{{ number_format($sales->sum('quantity'), 0) }}</th>
                <th scope="col" class="text-end px-3">
                    <div>{{ number_format($sales->sum('total_sales'), 0) }}</div>
                    <div>{{ number_format($totalSales->sum('total_sales'), 0) }}</div>
                </th>
                <th scope="col" class="text-center"></th>
            </tr>
        </tbody>
    </table>
    
    {{ $sales->links() }}

</div>

@endsection
