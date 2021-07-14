@extends('frontend.template_v1')
@section('title', "Payment Selection")
@section('content')
 <section class="chekout-steps-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
                      
          <div class="checkout-steps-indicator clearfix">
            
            <a href="#" class="item done" title="Email Address" name="email_address">
              <div class="wrapper">
                <div class="icon">
                  <span class="fa fa-envelope"></span>
                </div>
                <div class="step-num">1</div>
                <div class="step-title">Email Address</div>
              </div>
            </a>
            
            <a href="#" class="item done" title="Shipping Details" name="shipping_details">
              <div class="wrapper">
                <div class="icon">
                  <span class="fa fa-truck"></span>
                </div>
                <div class="step-num">2</div>
                <div class="step-title">Shipping Details</div>
              </div>
            </a>
            
            <a href="#" class="item current" title="Payment Details" name="payment_details">
              <div class="wrapper">
                <div class="icon">
                  <span class="fa fa-credit-card"></span>
                </div>
                <div class="step-num">3</div>
                <div class="step-title">Payment</div>
              </div>
            </a>
            
            <a href="#" class="item" title="Review Order" name="review_order">
              <div class="wrapper">
                <div class="icon">
                  <span class="fa fa-list"></span>
                </div>
                <div class="step-num">4</div>
                <div class="step-title">Review Order</div>
              </div>
            </a>
            
          </div>
          
        </div>
      </div>
    </div>
  </section>
    <section style="padding-top: 30px;">
        <div class="container">
            <h3>Payment Option</h3>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="cart-container">
        <form  method="post" action="{{ route('payment.selected')}}">
		 @csrf  
          <div class="form-frame" style="color: #6f6f72;">
                      
            <div class="radio">
              <label>
                <input type="radio" name="paymentMode" id="paymentMode-ebs" value="epay-ebs">
              <b>EBS Payment Gateway</b><br>(Credit Cards / Debit Cards / UPI / Net Banking / Wallets)
              </label>
            </div>
            
              
              <div class="radio">
              <label>
                <input type="radio" name="paymentMode" id="paymentMode-razorpay" value="epay-razorpay" checked>
                <b>Razorpay Payment Gateway</b><br>(Credit Cards / Debit Cards / UPI / Net Banking / Wallets)
              </label>
            </div>
            
            <div class="radio">
              <label>
                <input type="radio" name="paymentMode" id="paymentMode-paypal" value="epay-paypal">     
              <b> PayPal</b>
              </label>
            </div>
                      </div>

        
      <input type="submit" name="paymentproceed" class="btn btn-custom btn-curved btn-wide btn-brand" value="Confirm Order"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    @include('frontend.cart_summary')
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-sm-8">
                    <div class="cart-action-box">
                        <a href="{{ URL('/products')}}" class="btn btn-custom btn-curved btn-wide btn-white">
                            <span class="glyphicon glyphicon-heart"></span> Shipping
                        </a>
                    </div>
                    <div class="cart-action-box right">
                       
                        
                       <!-- 
                        <small class="tip">Tip: Shop for USD175 &amp; above to avail free shipping</small> -->
                    </div>
                </div> <!-- ./col -->
                <div class="col-sm-4">
                  <div id="price-area" class="table-responsive cart-container">
                        <table class="table cart-table price-table">
                        <thead>
                        <tr>
                        <th colspan="2">Shipping To</th>
                        </tr>
                        </thead>
                        </table> 
                        <p style="font-size: 12px;
    font-weight: 400;
    color: #6f6f72;">Vamsi Kollu<br>Dr.No-1-295,Sanjay nagar colony,<br>Madhapur,<br>Hyderabad.<br>Pincode-500086<br>Phone: +91-9854854854<br>Email: Kolluvamsi@gmail.com</p>           
                    </div>
                  
                </div>
            </div>
			
			   </form>
            
        </div>
    </section>
@endsection