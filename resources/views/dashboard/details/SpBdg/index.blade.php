@extends('dashboard.layouts.main')

@section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom mb-3">
      <a href="/dashboard" class="btn btn-warning btn-sm"><span data-feather="home"></span> Main Dashboard</a>
          <h6 class="text-muted">Welcome, @Saripetojo Bandung Dashboard | 
              <div class="btn btn-secondary btn-sm">
                  {{ auth()->user()->name }}
              </div>
          </h6>
  </div>
  <div>
    <div class="row mb-3">
      <div class="col-xl-4 panel panel-heading">
        <form action="/dashboard/details/SpBdg">
            @csrf
            From: <input type="date" name="fromDate" class="" value="{{ date('Y-m-01') }}">
            To: <input type="date" name="toDate" class="" value="{{ date('Y-m-t') }}">
            <button type="submit" name="search" class="btn btn-success btn-sm">Refresh</button>
        </form>
      </div>
    </div>

    <div class="row"> 
        <div class="col-xl-3 mb-3">
          <div class="card card-body bg-primary bg-opacity-75 text-white">
            <div class="row">
              <div class="col-lg-6 card-body"><h5> {{ number_format($sales->sum('total_sales'), 0) }}</h5></div>
              <div class="col-lg-6 card-body">
                <h6><small>Tube </small>  | {{ number_format($salesTube->sum('total_sales')) }} </h6>
                <h6><small>Block</small>  | {{ number_format($salesBlock->sum('total_sales')) }} </h6>
                <h6><small>Slice</small>  | {{ number_format($salesSlice->sum('total_sales')) }} </h6>
              </div>
            </div>
            <div class="">Total Net Sales</div>
          </div> 
        </div>
        <div class="col-xl-3 mb-1">
          <div class="card card-body bg-primary bg-opacity-75 text-white mb-4">
            <div class="row">
              <div class="col-lg-6 card-body"><h6>{{ number_format($salesTube->sum('total_sales'), 0) }}</h6></div>
              <div class="col-lg-6 card-body"><h4>{{ number_format($salesTube->sum('quantity')) }} Bag</h4></div>
            </div>
            <div class="">Tube Ice Sales</div>
          </div> 
        </div>
        <div class="col-xl-3 mb-1">
          <div class="card card-body bg-primary bg-opacity-75 text-white mb-4">
            <div class="row">
              <div class="col-lg-6 card-body"><h6>{{ number_format($salesBlock->sum('total_sales'), 0) }}</h6></div>
              <div class="col-lg-6 card-body text-end"><h4>{{ number_format($salesBlock->sum('quantity')) }} Block</h4></div>
            </div>
            <div class="">Block Ice Sales</div>
          </div> 
        </div>
        <div class="col-xl-3 mb-1">
          <div class="card card-body bg-primary bg-opacity-75 text-white mb-4">
            <div class="row">
              <div class="col-lg-6 card-body"><h6>{{ number_format($salesSlice->sum('total_sales'), 0) }}</h6></div>
              <div class="col-lg-6 card-body text-end"><h4>{{ number_format($salesSlice->sum('quantity')) }} Bag</h4></div>
            </div>
            <div class="">Slice Ice Sales</div>
          </div> 
        </div>
    </div>

    <div class="p-1"><small>Daily Product Sales Quantity
      <div class="row">
        <div class="col">
          <table class="table table-bordered table-succes table-striped table-sm bg-light">
            <thead>
              <tr>
                  <th width="5%" class="text-center">#</th>
                      @if($salesTube->count())
                          @foreach ($salesTube as $Tube)
                              <th>{{ date("d-M",strtotime($Tube['invoice_date'])) }}</th>
                          @endforeach
                      @else
                          <td class="text-muted"><b>No sales data found.</b></td>
                      @endif
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td width="5%">Tube Ice</td>
                      @if($salesTube->count())
                          @foreach ($salesTube as $Tube)      
                              <td>{{ $Tube->quantity }}</td>
                          @endforeach
                      @else
                          <td class="text-muted"><b>No sales data found.</b></td>
                      @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  
      <div class="row">
        <div class="col">
          <table class="table table-bordered table-succes table-striped table-sm bg-light">
            <thead>
              <tr>
                  <th width="5%" class="text-center">#</th>
                      @if($salesBlock->count())
                          @foreach ($salesBlock as $Block)
                              <th>{{ date("d-M",strtotime($Block['invoice_date'])) }}</th>
                          @endforeach
                      @else
                          <td class="text-muted"><b>No sales data found.</b></td>
                      @endif
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td width="5%">Block Ice</td>
                      @if($salesBlock->count())
                          @foreach ($salesBlock as $Block)      
                              <td>{{ $Block->quantity }}</td>
                          @endforeach
                      @else
                          <td class="text-muted"><b>No sales data found.</b></td>
                      @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <table class="table table-bordered table-succes table-striped table-sm bg-light">
            <thead>
              <tr>
                  <th width="5%" class="text-center">#</th>
                      @if($salesSlice->count())
                          @foreach ($salesSlice as $Slice)
                              <th>{{ date("d-M",strtotime($Slice['invoice_date'])) }}</th>
                          @endforeach
                      @else
                          <td class="text-muted"><b>No sales data found.</b></td>
                      @endif
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td width="5%">Slice Ice</td>
                      @if($salesSlice->count())
                          @foreach ($salesSlice as $Slice)      
                              <td>{{ $Slice->quantity }}</td>
                          @endforeach
                      @else
                          <td class="text-muted"><b>No sales data found.</b></td>
                      @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- <div class="row">
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
                <td class="text-end px-3">{{ number_format($sale->quantity, 0) }}</td>
                <td class="text-end px-3">{{ number_format($sale->total_sales, 2) }}</td>
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
            </tr>
          </tbody>
        </table>
      </div>
    </div> --}}

      <div class="row mb-3">
        <div class="col-lg-6 border">
          <div class="card"><small class="text-muted mx-1 mb-1">Graphic sales</small>
            <div class="card-body">
                  <div id="sales_chart"></div>
            </div>
          </div>
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


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
      Highcharts.chart('sales_chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    xAxis: {
        categories: [],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Es Tube',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
            194.1, 95.6, 54.4]

    }, {
        name: 'Es Balok',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
            106.6, 92.3]

    }, {
        name: 'Es Serut',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3,
            51.2]

    }]
});
    </script>

@endsection