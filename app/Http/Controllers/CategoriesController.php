<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Models\Sku;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cat_products($slug=false)
    {
        //
		

		$Categories=Categories::where("slug",$slug)->orderBy('name', 'ASC')->get()->first();
		
	
		
		$pageTitle=Str::ucfirst($Categories->name??'');
		if($Categories){



			
		$Products=Sku::select('products.*','skus.price_inr as pprice','skus.product_id as productid')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->where("products.cat_id",$Categories->id)
		->where('skus.price_inr', '>',0)	
		->orderBy('skus.price_inr','ASC')->get()->unique('name');
		
		
		/* 	foreach ($Products as $key => $value) {
			$Products[$key]->images = DB::table('skus')->select('skus.price_inr as pprice')
			->where('skus.product_id', $value->id)
			->where('skus.price_inr', '>',0)
			->limit(1)
			->get();
			}	
		 */
		$catslug=$slug;
		
		}else{
			$Products='';
			$catslug=='';
		}
		

		return view('frontend.products', compact('pageTitle','Products','catslug'));
    }   


	public function index()
    {
        $categories_data = Categories::all();
        $pageTitle = "Categories";
        return view('admin.categories.categories_list',compact('categories_data','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle="Add Parent Category";
        return view('admin.categories.add_edit_category',compact(['pageTitle']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
         'name' => 'required',
         'slug' => 'required',
        ]);

        Categories::create($request->all());
        return redirect()->route('categories.index')->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
