<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	
	 public function show_product($slug=false)
    {
   
		
		$Products=Products::where("slug",$slug)->orderBy('name', 'ASC')->get()->first();

		
	
		
		$pageTitle=Str::ucfirst($Products->name);
		if($Products){
			
			
		$Products=Products::select('skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.product_id','=','products.id')
		->where("products.slug",$slug)
		->where('skus.sku_code','LIKE',"%-1")
		->get();
		
	
		
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->images = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->get();
		}		

		
		
		}
	return view('frontend.single_product', compact('pageTitle','Products'));
    }  	 
	
	public function show_cart()
    {
        //
		return view('frontend.cart');
    }   	
	
	

	
	public function show_payments()
    {
        //
		return view('frontend.payment_selection');
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
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
