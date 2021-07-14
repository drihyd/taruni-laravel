@extends('frontend.template_v1')
@section('title', "Checkout Review")
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
            
            <a href="#" class="item done" title="Payment Details" name="payment_details">
              <div class="wrapper">
                <div class="icon">
                  <span class="fa fa-credit-card"></span>
                </div>
                <div class="step-num">3</div>
                <div class="step-title">Payment</div>
              </div>
            </a>
            
            <a href="#" class="item current" title="Review Order" name="review_order">
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
        @if ($basicCart_details->count()==0)
			<div class="container">
			
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3>Review Order</h3>
					
					<div id="products-area" style="min-height: 30px;">
						
						<div class="text-align-center padding-bottom-30">
							<h2 class="smaller">Cart Empty</h2>
							<p>Oops! Seems like your closet is empty.<br>Add your favorite outfits now, buy them later.</p>
							<a href="{{ URL('/')}}" class="btn btn-custom btn-curved btn-brand btn-wide btn-sm btn-no-margin">Continue Shopping</a>
						</div>
						
					</div> <!-- ./products-area -->
					
			
					</div>
				</div>
			</div>
		@else
        <div class="container">
		<h3>Review Order</h3>
            <div class="row">
			

                <div class="col-sm-8">
				
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="cart-container">
                                <table class="table cart-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">ITEMS ({{$basicCart_details->count()??0}})</th>
                                            <th>QUANTITY</th>
                                            <th></th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									 @foreach($basicCart_details as $item)
                                        <tr>
                                            <td class="product-image-td">
                                            <img src="{{env('BASE_URL').$item->pcode.'_dp.jpg'}}" alt="{{Str::ucfirst($item->pname)}}">
                                            </td>
                                            <td class="product-details-td" id="cart-item-1">
                                            <h3 class="product-title">{{Str::ucfirst($item->pname)}}</h3>
                                            <p class="detail-item">
                                            <span class="heading">Size:</span>
                                            <span class="info"></span>
                                            </p>
                                            <p class="detail-item">
                                            <span class="heading">Alteration:</span>
                                            <span class="info">No</span>
                                            </p>
                                            <div class="actions">
                                            <a href="{{ URL('/product/'.$item->slug)}}" class="action-item cart-item-view-details">View Details</a>
                                            <!--
											<a href="{{ route('checkout.cart.remove', Crypt::encryptString($item->itemid)) }}">
                                            <div class="action-item cart-item-remove" id="cart-item-id">Remove</div>
                                            </a>
											-->
											 <!--
                                            <span class="prod-alt-link"><a href="#" data-category="25" id="alts-333542" class="action-link custButton alt-edit-link" data-toggle="modal" data-target="#modelId"><span class="symb">✂</span>Make Alterations</a></span>
											-->
                                            </div>		
                                            </td>
                                            <td>

                                            {{$item->itemqty}}
                                            
                                            </td>
                                            <td>
                                            
                                            </td>
                                            <td class="product-price-td">
                                            <p class="price price-shown">INR {{$item->itemprice}} /-</p>
                                            </td>
                                            </tr>											
											@endforeach
                                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-sm-4">				
                    @include('frontend.cart_summary')						
                    </div>					
					
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-sm-8">
                    <div class="cart-action-box">
                        <a href="{{ URL('/checkout')}}" class="btn btn-custom btn-curved btn-wide btn-white">
                            <span class="glyphicon glyphicon-heart"></span> Shipping
                        </a>
                    </div>
                    <div class="cart-action-box right">
                        <a href="{{ URL('/payment')}}" class="btn btn-custom btn-curved btn-wide btn-brand"> 
                        Proceed to payments
                        </a><!-- 
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
							@include('frontend.cart_shipped')           
                    </div>
                  
                </div>
            </div>
			
			@endif
            
        </div>
    </section>
@endsection