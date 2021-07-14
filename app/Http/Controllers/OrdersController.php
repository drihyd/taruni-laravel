<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_details;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_data=Cart_details::select('carts.created_at as created_at','carts.grand_total as grand_total','carts.order_status as order_status','carts.ship_to_name as shipername','carts.ship_to_email as shiperemail','carts.ship_to_phone as shiperphone','carts.gateway_name as pggateway','carts.id as order_number','cart_items.item_size as item_size','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
->leftjoin('skus','skus.id','=','cart_items.sku_id')
->leftjoin('products','skus.product_id','=','products.id')
->leftjoin('carts','carts.id','=','cart_items.cart_id')
->where("carts.order_status",'=','placed')
->get();


        $pageTitle = "Orders";
        return view('admin.orders.orders_list',compact('orders_data','pageTitle'));
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
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
