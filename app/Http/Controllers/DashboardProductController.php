<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pagination = 14;

        if(request()->has('keyword'))
        { 

            $products = product::where('product_name', 'LIKE', '%' . request('keyword') . '%')
                    ->get();
            
        } else {
            
            $products = product::all();
            
        }
        return view('dashboard.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $query = DB::table('products')->select(DB::raw('MAX(RIGHT(product_id,4)) as kode'));
        
        $code = "";
        if($query->count()>0)
        {
            foreach($query->get() as $q)
            {
                $number = ((int)$q->kode)+1;
                $code = sprintf("PRO.AG-"."%04s", $number);
            }
        } else {
            $code = "PRO.AG-"."0001";
        }

        return view('dashboard.products.create', [
            'product_id' => $code,
            'products' => product::all()
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
            'product_id' => 'required',
            'product_name' => 'required|unique:products|max:255',
            'category' => 'required',
            'uom' => 'required',
            'product_description' => 'required',
            'unit_cost_price' => 'required',
            'unit_price' => 'required'

        ]);

        
        product::create($validateData);

        return redirect('/dashboard/products')->with('success', 'New product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $rules = [
            'category' => 'required',
            'uom' => 'required',
            'product_description' => 'required',
            'unit_cost_price' => 'required',
            'unit_price' => 'required'
        ];

        if($request->product_name != $product->product_name){
            $rules['product_name'] = 'required|unique:products|max:255';
        }

        $validateData = $request->validate($rules);

        product::where('id', $product->id)
            ->update($validateData);

        return redirect('/dashboard/products')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        // dd($product->id);
        {
            product::destroy($product->id);
    
            return redirect('/dashboard/products')->with('success', 'One product data has been deleted!');
        }
    }
}
