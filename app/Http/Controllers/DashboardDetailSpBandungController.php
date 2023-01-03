<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardDetailSpBandungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('fromDate', 'toDate'))
        { 

            $sales = Sale::whereBetween('invoice_date', [request('fromDate'), request('toDate')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->orderBy('invoice_date', 'desc')->get();
            $salesTube = Sale::whereBetween('invoice_date', [request('fromDate'), request('toDate')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->where('product_name', 'Es Tube')
                    ->get();
            $salesBlock = Sale::whereBetween('invoice_date', [request('fromDate'), request('toDate')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->where('product_name', 'Es Balok')
                    ->get();
            $salesSlice = Sale::whereBetween('invoice_date', [request('fromDate'), request('toDate')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->where('product_name', 'Es Serut')
                    ->get();

        } else {
            
            $sales = Sale::whereBetween('invoice_date', [date('Y-m-01'), date('Y-m-t')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->orderBy('invoice_date', 'desc')->get();
            $salesTube = Sale::whereBetween('invoice_date', [date('Y-m-01'), date('Y-m-t')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->where('product_name', 'Es Tube')
                    ->get();
            $salesBlock = Sale::whereBetween('invoice_date', [date('Y-m-01'), date('Y-m-t')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->where('product_name', 'Es Balok')
                    ->get();
            $salesSlice = Sale::whereBetween('invoice_date', [date('Y-m-01'), date('Y-m-t')])
                    ->where('branch_name', 'Saripetojo Bandung')
                    ->where('product_name', 'Es Serut')
                    ->get();
        }
        
        return view('dashboard.details.SpBdg.index', compact('sales', 'salesTube', 'salesBlock', 'salesSlice'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

}
