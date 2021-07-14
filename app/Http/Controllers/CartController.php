<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
public function addToCart(Request $request)
{


    $product = Products::findOrFail($request->input('productId'));
    //$options = $request->except('_token', 'productId', 'price', 'qty');
    //Cart::add(, $product->name, $request->input('price'), $request->input('qty'), $options);
	

	if (empty($request->qty)) {
		$quantity = 1;
	}
	else{
		$quantity=$request->qty;
	}

	if(Auth::Guest()){		
		$basicCart = Cart::select('id')->where('id', session()->get('cart'))->where("order_status",'!=','placed')->latest()->first();
		if(!$basicCart) 
		{	
			$cartid= Cart::updateOrCreate(
			[
			'session_id' =>Str::uuid()->toString(),
			'total_amount' => 0,
			'user_id' => 0,
			'total_items' => 0,
			'total_shipping_weight' => 0,
			'cod_fee' => 0,
			'grand_total' => 0,
			'guest_checkout' => 'yes',
	
			]
			);	
			$cartid=$cartid->id;			
	
			session()->put('cart',$cartid);
		}
		
		$basicCartdetails = Cart_details::select('id')->where('cart_id', session()->get('cart'))->where('sku_id', $request->skuid)->get();
		if($basicCartdetails->count()==1){
			 return redirect()->route('orders.show_cart')->with('error', 'Item already added to cart.');

		}else{			
			$cartdetails=Cart_details::updateOrCreate(
			[
			'cart_id' => session()->get('cart'),
			'qty' => $quantity,
			'unit_price' => $request->price,
			'price' => $request->price*(int)$quantity,
			'sku_id' => $request->skuid,
			'alter_sleeves' => $request->attachSleeves,
			'alter_dress' => $request->alterations,
			'item_size' => $request->sku,
			]);	
			 return redirect()->route('orders.show_cart')->with('message', 'Item added to cart successfully.');
		}		
	}
	else{
		$user = \Auth::user();	
		
		
		$basicCart = Cart::select('id')->where('user_id',$user->id)->where("order_status",'!=','placed')->get();
			if($basicCart->count()==0) {
			$cartid= Cart::Create(							
				[
				'session_id' =>$user->id,
				'user_id' =>$user->id,	
				'guest_checkout' => 'no',
				'total_items' => 0,
				'total_shipping_weight' => 0,
				'cod_fee' => 0,
				'grand_total' => 0,
				'total_amount' => 0,

				]
				);				
				$cartid=$cartid->id;	
				session()->put('cart',$cartid);	
			
				
				
				
			}
			else{

				
			$cartid= Cart::updateOrCreate(
				['id' =>session()->get('cart')],			
				[
				'session_id' =>$user->id,
				'user_id' =>$user->id,	
				'guest_checkout' => 'no',
				'total_items' => 0,
				'total_shipping_weight' => 0,
				'cod_fee' => 0,
				'grand_total' => 0,
				'total_amount' => 0,
	
				]
				);	
				$cartid=$cartid->id;	
				session()->put('cart',$cartid);	
		
				
			}
			
		$basicCartdetails = Cart_details::select('id')->where('cart_id', session()->get('cart'))->where('sku_id', $request->skuid)->get();
		if($basicCartdetails->count()==1){
		return redirect()->route('orders.show_cart')->with('error', 'Item already added to cart.');

		}else{

			
			$cartdetails=Cart_details::updateOrCreate(
			[
			'cart_id' => session()->get('cart'),
			'qty' => $quantity,
			'unit_price' => $request->price,
			'price' => $request->price*(int)$quantity,
			'sku_id' => $request->skuid,
			'alter_sleeves' => $request->attachSleeves,
			'alter_dress' => $request->alterations,
			'item_size' => $request->sku,

			]);	
			 return redirect()->route('orders.show_cart')->with('message', 'Item added to cart successfully.');
		}	
	

		
	}
	
}
	 
	public function getCart()
    {
	
		
		$user = \Auth::user();	
		if (Auth::check()) {		
			$basicCart = Cart::select('*')->where('user_id', $user->id)->latest()->first();
			
			$basicCart_details=Cart_details::select('cart_items.item_size as item_size','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
			->leftjoin('skus','skus.id','=','cart_items.sku_id')
			->leftjoin('products','skus.product_id','=','products.id')
			->leftjoin('carts','carts.id','=','cart_items.cart_id')
			->where("carts.user_id",$user->id)
			->where("carts.order_status",'!=','placed')
			->get();		
		}
		else{
			$basicCart = Cart::select('*')->where('id', session()->get('cart'))->latest()->first();
			$basicCart_details=Cart_details::select('cart_items.item_size as item_size','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
			->leftjoin('skus','skus.id','=','cart_items.sku_id')
			->leftjoin('products','skus.product_id','=','products.id')
			->leftjoin('carts','carts.id','=','cart_items.cart_id')
			->where("cart_id",session()->get('cart'))
			->where("carts.order_status",'!=','placed')
			->get();
		}		

		if($basicCart_details->count()>0){
			if (Auth::check()) {				
				$cart_id=$basicCart->id;		
			}
			else{
				$cart_id=session()->get('cart');
			}
			
			$this->cart_calculations($cart_id);	
		}		
		return view('frontend.cart',compact('basicCart_details'));

    }
	
	
	function cart_calculations($cartid=false){		
		$Cart_details_sum=Cart_details::select('*')->where('cart_id',$cartid)->sum('price');
		$cartupdate=Cart::updateOrCreate(['id' =>$cartid],['total_amount' =>$Cart_details_sum,'grand_total' =>$Cart_details_sum]);
	}
	
	public function update_cart(Request $request)
    {	
		
      if($request->itemid && $request->quantity){
		  $cartupdate=Cart_details::updateOrCreate(['id' =>$request->itemid],['qty' =>$request->quantity,'price' =>$request->unitprice*(int)$request->quantity]);
		  $this->cart_calculations(session()->get('cart'));
		if($cartupdate){
			return response()->json(['success' => 'You have changed QUANTITY to '.$request->quantity,'statusCode'=>200]);
			
		}
		else{
         return response()->json(['error' => 'Item updated to cart failed','statusCode'=>201]);
        }
	  }		
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
public function removeItem($keyid=false)
{
	$id=Crypt::decryptString($keyid);
	$cartitem = Cart_details::find($id);
	$cartitem->delete();
	$this->cart_calculations(session()->get('cart'));
	
	$count=Cart_details::select('id')->where('cart_id',session()->get('cart'))->where("item_status",'!=','placed')->count();
	if($count==0){
		$cart = Cart::find(session()->get('cart'));
		$cart->delete();
	}
    return redirect()->back()->with('message', 'Successfully removed from your cart.');
}


	public function show_checkout()
    {
        //
		if (Auth::check()) {
		// The user is logged in...
		return view('frontend.checkout');
		}
		else{
		return redirect()->route('registeration.form');
		}

    }   

		public function show_checkout_review(Request $request)
    {
        //
		
		 $cartupdate=Cart::updateOrCreate(
		 ['id' =>session()->get('cart')],
		 [
			'ship_to_name' =>$request->firstname." ".$request->lastname,
			'ship_to_email' =>$request->email??"",
			'ship_to_phone' =>$request->mobile??"",
			'ship_to_address' =>$request->address??"",		
			'ship_to_city' =>$request->city??"",
			'ship_to_state' =>$request->state??"",
			'ship_to_country' =>$request->country??"",	
			'ship_to_postalcode' =>$request->pincode??"000000",
		 ]
		 );
		 
		 $cartupdate=Customer::updateOrCreate(
		 ['id' =>Auth::user()->id],
		 [
			'pincode' =>$request->pincode??"000000",
			'address' =>$request->address??"",		
			'city' =>$request->city??"",
			'state' =>$request->state??"",
			'country' =>$request->country??"",			
		 ]
		 );			

		$basicCart_details=Cart_details::select('products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.id','=','cart_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->where("cart_id",session()->get('cart'))
		->where("item_status",'!=','placed')
		->get();		
		if($basicCart_details->count()>0){
		$this->cart_calculations(session()->get('cart'));	
		}	
		return view('frontend.review_checkout',compact('basicCart_details'));
    }  	
	
    public function index()
    {
        //
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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
