@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="text-muted">Sales Invoice</h4>
    <h6 class="text-muted">Welcome, @Saripetojo Cirebon Sales Dashboard | 
        <div class="btn btn-secondary btn-sm">
            {{ auth()->user()->name }}
        </div>
    </h6>
</div>

<div class="box-body">
  <form method="post" action="/dashboard/sales/SpCrb" class="mb-5">
      @csrf
          <div class="row">
              <div class="col-md-6 mb-3">
                  <div class="box-body col-sm-3 mb-5">
                      <label for="invoice_date" class="form-label">Invoice Date</label>
                          <input type="date" class="form-select @error('invoice_date') is-invalid @enderror" id="invoice_date" name="invoice_date" required autofocus value="{{ date('Y-m-d') }}">
                          @error('invoice_date')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                  </div>
                  <div class="box-body col-sm-5 mb-3">
                      <label for="branch_name" class="form-label">Branch</label>
                          <select class="form-select" name="branch_name" id="">
                              <option selected="" disabled="" value="" class="text-muted">Select Branch..</option>
                              @foreach ($branches as $branch)
                                  @if(old('branch_name') == $branch->id)
                                      <option value="{{ $branch->branch_name }}" selected>{{ $branch->branch_name }}</option>
                                  @else
                                      <option value="{{ $branch->branch_name }}">{{ $branch->branch_name }}</option>
                                  @endif
                              @endforeach
                          </select>
                          @error('branch_name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                  </div>
              </div>

              <div class="col-md-6 mb-3">
                  <div class="box-body col-sm-4 mb-3">
                      <label for="invoice_number" class="form-label">Invoice Number</label>
                          <input type="text" class="form-control @error('invoice_date') is-invalid @enderror" id="invoice_number" name="invoice_number" required value="{{ $invoice_number }}" readonly>
                          @error('invoice_number')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                  </div>
              </div>
          </div>
        
        {{-- Isi Tabel Invoice --}}
        <table class="table teble-responsive table-bordered" id="dynamicAddRemove">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">UoM</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Total Sales</th>
                    <th class="text-center">#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-md-2">
                        <input type="text" class="form-control @error('id') is-invalid @enderror text-center" id="id" name="id" readonly>
                    </td>
                    <td class="col-md-4">
                        <select class="form-select" name="product_name" id="product_name">
                            <option selected="" disabled="" value="" class="text-muted" readonly>Select Product..</option>
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
                    </td>
                    <td class="col-md-1">
                        <input type="text" class="form-control @error('uom') is-invalid @enderror text-center" id="uom" name="uom" readonly>
                    </td>
                    <td class="col-md-1">
                        <input type="double" onchange="hitung()" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required value="{{ old('quantity') }}">
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </td>
                    <td class="col-md-2">
                        <input type="double" onchange="hitung()" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price" name="unit_price" required value="{{ old('unit_price') }}">
                            @error('unit_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </td>
                    <td class="col-md-2">
                        <input type="double" class="form-control @error('total_sales') is-invalid @enderror" id="total_sales" name="total_sales" readonly>
                            @error('total_sales')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td class="text-center">
                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary btn-sm">+</button>
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <div class="row">
              <div class="col-lg-12">
                <a href="/dashboard/sales/SpCrb" class="btn btn-warning btn-md">Cancel</a>
                <button type="submit" class="btn btn-primary btn-md">Save</button>
              </div>
            </div>
        </form>
      </div>
            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
<script>
function hitung(){
    var qty = document.getElementById("quantity").value;
    var price = document.getElementById("unit_price").value;
    var result = parseInt(qty) * parseInt(price);
    
    if(!isNaN(result))
    {
    document.getElementById("total_sales").value = result;
    }
}
</script>

<script type="text/javascript">
    $(document).on('change', '#product_name', function(){
        let product_name = $(this).val()
        $.ajax({
            url : '/dashboard/sales/SpCrb/' +$(this).val(),
            type : 'post',
            data : {
                product_name : product_name,
                _token : "{{ csrf_token() }}"
            }, success : function (res) {
                $('#id').val(res.data.product_id)
                $('#uom').val(res.data.uom)
            }, error : function(xhr) {
                console.error(xhr);
            } 
        })
    })
</script>


@endsection