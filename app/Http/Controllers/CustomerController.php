<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\PasswordValidationRules;
use Session;
use App\Models\Cart;
use App\Models\Cart_details;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customRegistration(Request $request)
    {
        //		
	$userdetails = Customer::select('id')->where('email',$request->email)->get();
	if($userdetails->count()==0){	
	$data = 
		[
		'firstname' =>$request->firstname??'',
		'lastname' =>$request->lastname??'',
		'phone' =>$request->mobile??"",
		'city' =>$request->city??"",
		'pincode' =>$request->pincode??"000000",
		'country' =>$request->country??"",
		'state' =>$request->state??"",
		'address' =>$request->address??"",
		'email' =>$request->email??"",
		'password' =>Hash::make($request->password),
		'gender' =>$request->gender??'',
		];				
		Customer::updateOrCreate($data);
		
	
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {				
				if (Auth::check()) {				
				//return redirect('/')->back()->with('message', 'Account is created successfully.');
				 //return redirect()->back()->with('message', 'Account is created successfully.');


				if(session()->get('cart')){
					Cart::updateOrCreate(
						['id' =>session()->get('cart')],			
						[
						 'user_id' => Auth::user()->id,
						 'session_id' => Auth::user()->id,
						]
					);	
				}
				
				
				 
			return redirect('/')->with('message', "You have been successfully registered and logged in.");
		
			}
			// Authentication was successful...
			//return redirect()->route('orders.checkout')->with('message', 'Account is created successfully.');
			}
			else{
				//return redirect('/')->route('orders.checkout')->with('error', 'Account is not created.');
				 return redirect()->back()->with('error', 'Account is not created.');  
			}
			
		}
		else{
			 //return redirect('/')->back()->with('error', 'User already exist an account.');
			  return redirect()->back()->with('error', 'User already exist an account.');  
		}
			
		
	
           
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
	
	
    public function customLogin(Request $request)
    {
	
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {				
			if (Auth::check()) {			
			return redirect('/')->with('message', "Successfully logged in.");
			}
			else{
			// if failed login
			return redirect()->back()->with('error', 'Failed to login.');
			}
		}
		else{
			return redirect()->back()->with('error', 'something went wrong. please try again.');
		}
	
	}
	
	
public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('message', 'You have been successfully logged out!'); 
	}
	public function signin()
    {
        return view('frontend.signup');
	}
	
	
	
	
}
