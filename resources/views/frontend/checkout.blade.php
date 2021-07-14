@extends('frontend.template_v1')
@section('title', "Checkout")
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
            <h3>Shipping Details</h3>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="cart-container">
                     <form  action="{{ route('register.checkout') }}" method="POST" role="form" >
					 @csrf
                                    <div class="form-wrap">
                
                        <label for="log-email">Firstname</label>
                        <div class="form-group">
                            <input name="firstname" type="text" class="form-control" id="firstname" value="{{Auth::user()->firstname??''}}" placeholder="Firstname" required>
                          </div>     
						  <label for="log-email">Lastname</label>
                        <div class="form-group">
                            <input name="lastname" type="text" class="form-control" id="lastname" value="{{Auth::user()->lastname??''}}" placeholder="Lasttname" required>
                          </div>
                <div class="row">
                  <div class="col">
                <label for="log-email">Enter Email</label>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" id="log-email" value="{{Auth::user()->email??''}}" placeholder="Email" required>
                  <span class="valid-feedback">Looks good!</span>
                  <span class="invalid-feedback"> choose a username.</span>
                </div>
                </div>
                <div class="col">
                <label for="log-email">Mobile</label>
                <div class="form-group">
                  <input type="number" name="mobile" class="form-control" id="log-email" value="{{Auth::user()->phone??''}}" placeholder="mobile" required>
                  <span class="valid-feedback">Looks good!</span>
                  <span class="invalid-feedback"> choose a username.</span>
                </div>
                </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="log-email">Country</label>
                        <div class="form-group">
                            <select name="country" class="form-control custom-select" id="country" required>
                                <option value="india" selected>India</option>
                                <option value="australia">Australia</option>
                                <option value="usa">USA</option>
                            </select>
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">State</label>
                        <div class="form-group">
                            <input name="state"  type="text" class="form-control" id="state" value="{{Auth::user()->state??''}}" placeholder="state" required>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="log-email">City</label>
                        <div class="form-group">
                            <input name="city" type="text" class="form-control" id="city" value="{{Auth::user()->city??''}}" placeholder="City" required>
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">Postal Code</label>
                        <div class="form-group">
                            <input name="pincode" type="text" class="form-control" id="pincode" value="{{Auth::user()->pincode??''}}" placeholder="Postal code" required>
                          </div>
                    </div>
                </div>
                <label for="log-email">Full Address</label>
                        <div class="form-group">
                            <textarea name="address" class="form-control"  rows="3">{{Auth::user()->address??''}}</textarea>
                          </div>
              </div>
			   <button type="submit" class="btn btn-dark btn-block">Confirm</button>
                                </form>
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
                            <span class="glyphicon glyphicon-heart"></span> Select More
                        </a>
                    </div>
					<!--
                    <div class="cart-action-box right">
                        <a href="{{ URL('/checkout_review')}}" class="btn btn-custom btn-curved btn-wide btn-brand"> 
                        
                        </a>
					
                        <small class="tip">Tip: Shop for USD175 &amp; above to avail free shipping</small>
                    </div>-->
                </div> <!-- ./col -->
            </div>
            
        </div>
    </section>
@endsection