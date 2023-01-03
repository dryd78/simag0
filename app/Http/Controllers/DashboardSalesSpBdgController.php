<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Branch;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardSalesSpBdgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 14;

        if(request()->has('fromDate', 'toDate', 'keyword'))
        { 

            $sales = Sale::whereBetween('invoice_date', [request('fromDate'), request('toDate')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->Where('product_name', 'LIKE', '%' . request('keyword') . '%')
                    ->orderBy('invoice_date', 'desc')->paginate($pagination);
            
        } else {
            
            $sales = Sale::whereBetween('invoice_date', [date('Y-m-01'), date('Y-m-t')])
            ->where('branch_name', 'Saripetojo Bandung')
            ->Where('product_name', 'LIKE', '%' . request('keyword') . '%')
            ->orderBy('invoice_date', 'desc')->paginate($pagination);
            
        }

        $totalSales = Sale::whereBetween('invoice_date', [request('fromDate'), request('toDate')])
        ->where('branch_name', 'Saripetojo Bandung')->get();

        return view('dashboard.sales.SpBdg.index', compact('sales', 'totalSales'))
        ->with(key: 'i', value: ($request->input(key: 'page', default: 1) - 1) * $pagination);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $query = DB::table('sales')->select(DB::raw('MAX(RIGHT(id,4)) as kode'));
        
        $code = "";
        if($query->count()>0)
        {
            foreach($query->get() as $q)
            {
                $number = ((int)$q->kode)+1;
                $code = sprintf("INV.AG-" . date('y.m').'.'."%04s", $number);
            }
        } else {
            $code = "INV.AG-" . date('y.m').'-'."0001";
        }
        
        
        return view('dashboard.sales.SpBdg.create', [                                     
            'invoice_number' => $code,
            'sales' => Sale::all(),
            'products' => product::all(),
            'branches' => Branch::all(),
        ]);
        
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'invoice_date' => 'required',
            'invoice_number' => 'required',
            'branch_name' => 'required',
            'product_name' => 'required',
            'uom' => 'required',
            'quantity' => 'required',
            'total_sales' => 'required'
            
        ]);
        
        Sale::create($validateData);
        
        return redirect('/dashboard/sales/SpBdg')->with('success', 'New sales transaction has been added!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        {
            Sale::destroy($sale->id);
    
            return redirect('/dashboard/sales/SpBdg')->with('success', 'One sales data has been deleted!');
        }
    }

    public function getUom($product_name)
    {
        $data = product::where('product_name', $product_name)->first();
        return response()->json(['data' => $data]);
    }
}
