<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Branch;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardSalesInkabaController extends Controller
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
                    ->where('branch_name', 'inkaba')
                    ->orderBy('invoice_date', 'desc')->get();
        } else {
            
            $sales = Sale::whereBetween('invoice_date', [date('Y-m-01'), date('Y-m-t')])
            ->where('branch_name', 'inkaba')
            ->orderBy('invoice_date', 'desc')->get();
        }

        return view('dashboard.sales.inkaba.index', compact('sales'));   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sales.inkaba.create', [                                     
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
            'branch_name' => 'required',
            'product_name' => 'required',
            'uom' => 'required',
            'quantity' => 'required',
            'total_sales' => 'required'

        ]);

        Sale::create($validateData);

        return redirect('/dashboard/sales/inkaba')->with('success', 'New sales transaction has been added!');
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
            product::destroy($sale->id);
    
            return redirect('/dashboard/sales/inkaba')->with('success', 'One sales data has been deleted!');
        }
    }
    
}