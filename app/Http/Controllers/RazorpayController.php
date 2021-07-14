<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use Session;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Cart_details;


class RazorpayController extends Controller
{    
    public function payWithRazorpay()
    {        
        return view('payWithRazorpay');
    }

    public function payment(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {

                $payment->capture(array('amount'=>$payment['amount']));

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

		$ordernumber=$this->getNextOrderNumber();
	
        $payInfo = [
                   'payment_id' => $request->razorpay_payment_id,
                   'user_id' => Auth::user()->id,
                   'amount' => $request->amount,
                   'return_response' => json_encode($request->all()),
                   'cart_id' =>session()->get('cart'),
                   'order_number' =>$ordernumber,
                ];
                
        Payment::updateOrCreate($payInfo);
		
			Cart::updateOrCreate(
				['id' =>session()->get('cart')],			
				[
				 'order_number' =>$ordernumber,
				 'gateway_name' =>'razorpay',
				 'payment_mode' =>'online',
				 'payment_status' =>'paid',
				 'order_status' =>'placed',
				 'returned_from_gateway' =>'yes',
				 'user_id' => Auth::user()->id,
				]
			);			
			
			Cart_details::updateOrCreate(
				['cart_id' =>session()->get('cart')],			
				[
				 'item_status' =>'placed',
				]
			);	
		
        
   
		

        return response()->json(['success' => " Payment successful and Order number is $request->razorpay_payment_id"]);
    }
	
	
public function getNextOrderNumber()
{
    // Get the last created order
    $lastOrder = Cart::orderBy('created_at', 'desc')->first();

    if ( ! $lastOrder )
        // We get here if there is no order at all
        // If there is no number set it to 0, which will be 1 at the end.

        $number = 0;
    else 
        $number = substr($lastOrder->order_number, 3);

    // If we have ORD000001 in the database then we only want the number
    // So the substr returns this 000001

    // Add the string in front and higher up the number.
    // the %05d part makes sure that there are always 6 numbers in the string.
    // so it adds the missing zero's when needed.
 
    return 'ORD' . sprintf('%06d', intval($number) + 1);
}
}