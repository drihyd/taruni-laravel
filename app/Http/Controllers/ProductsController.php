<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Sku;
use App\Models\Categories;

Use Exception;

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
	
	 public function filter_products(Request $request)
    {
       	   
		   

		$Categories=Categories::where("slug",$request->cat_slug)->orderBy('name', 'ASC')->get()->first();
		
		if ($request->ajax()) {
		$prices=$request->my_range;
		$product_size=$request->sizes;
		if($request->colors){
		$product_colors = explode(",",implode($request->colors));
		}
		else{
		$product_colors = "";
		}
		
		if($request->fabrics){
		$product_fabrics = explode(",",implode($request->fabrics));
		}
		else{
		$product_fabrics = "";
		}
		$Products = DB::table('skus')->select('products.*','skus.price_inr as pprice')->where('skus.price_inr', '>',0)
	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->where("products.cat_id",$Categories->id)
		
			->where(function($Products) use ($prices){	
			if($prices){		
			$prices=explode(";",$prices);
			$Products->whereBetween('skus.price_inr',[$prices[0]??0,$prices[1]??10000]);  
			}		
		})
		->where(function($Products) use ($product_size){
			if($product_size){
			$Products->whereIn('skus.size',$product_size);  
			}			
		})
		->where(function($Products) use ($product_colors){
			if($product_colors){
			foreach ($product_colors as $key=>$color) {
			
				if($key==0) {
					$Products->where('products.name','LIKE',"%$color%");
				}
				else{
					$Products->where('products.name','LIKE',"%$color%");
				}	
			
			}						
				
			}			
		})
		
		->where(function($Products) use ($product_fabrics){
			if($product_fabrics){
			foreach ($product_fabrics as $key=>$fabric) {
			
				if($key==0) {
					$Products->where('products.name','LIKE',"%$fabric%");
				}
				else{
					$Products->where('products.name','LIKE',"%$fabric%");
				}	
			
			}						
				
			}			
		})
		
		->orderBy('skus.price_inr','ASC')					
		->get()
		->unique('name');
		$html = view('frontend.product_card', compact('Products'))->render();
		return $html;
	   
    }	
}

}
