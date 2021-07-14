@php
use App\Models\Cart;
use App\Models\Cart_details;







if (Auth::check()) {		
$Cart_total_sum=Cart_details::select('*')->where('cart_id',session()->get('cart'))->sum('price');
$Cart_details_count=Cart_details::select('*')->where('cart_id',session()->get('cart'))->count();	
}
else{
$Cart_total_sum=Cart_details::select('*')->where('cart_id',session()->get('cart'))->sum('price');
$Cart_details_count=Cart_details::select('*')->where('cart_id',session()->get('cart'))->count();

}
		


@endphp
 
 <div id="price-area" class="table-responsive cart-container">
                        <table class="table cart-table price-table">
                        <thead>
                        <tr>
                        <th>Price Details</th>
                        <th class="text-right">INR </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td class="heading">Cart Total ( {{$Cart_details_count}} Items)</td>
                        <td class="info">{{$Cart_total_sum}} /-</td>
                        </tr>
                        
                        <tr>
                        <td class="heading">Coupon Discount &nbsp;<a data-toggle="collapse" href="#collapseCoupon" aria-expanded="false" aria-controls="collapseExample" class="couponLink"> <small>(Have a Coupon?)</small></a>
                        
                        </td>
                        <td class="info success">
                        
                        0/-											
                        </td>
                        </tr>
                        <tr style="padding:0;margin:0;">
                        <td colspan="2" style="padding:0;margin:0;">
                        <form id="coupon_form" method="post">
                        <div class="collapse" id="collapseCoupon">
                        <div class="couponToggle">
                        <div class="input-group">													
                        <input name="coupon_code" type="text" class="form-control input-sm" placeholder="Enter your code..">
                        <span class="input-group-btn">
                        <button class="btn btn-sm" type="submit">Apply</button>
                        </span>													
                        </div>	
                        </div>	
                        </div>
                        </form>	
                        </td>	
                        </tr>
                        <tr>
                        <td class="heading">Delivery Charges</td>
                        <td class="text-right">Based on location</td>
                        </tr>
                        
                        </tbody>
                        <tfoot>
                        <tr>
                        <td class="heading">Grand Total</td>
                        <td class="info text-right">{{$Cart_total_sum}}/-</td>
                        
                        </tr>
                        </tfoot>
                        </table>						
                        <p class="note text-center mt-3 mb-0">Need Help? <a href="{{ URL('/contactus')}}">Contact Us</a></p>
</div>