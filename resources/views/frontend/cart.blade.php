@extends('frontend.template_v1')
@section('title', "Cart")
@section('content')
 <section>
 

 
 
		@if ($basicCart_details->count()==0)
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						
					
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
                                            <span class="info"> {{$item->item_size}}</span>
                                            </p>
                                            <p class="detail-item">
                                            <span class="heading">Alteration:</span>
                                            <span class="info">{{$item->alter_sleeves??''}}</span>
                                            </p>
                                            <div class="actions">
											
                                            <a href="{{ URL('/product/'.$item->slug)}}" class="action-item cart-item-view-details">View Details</a>
											<a  class="" href="{{ route('wishlist.store', Crypt::encryptString($item->pid))}}"><i class="fas fa-heart float-right"></i></a>
                                            <a href="{{ route('checkout.cart.remove', Crypt::encryptString($item->itemid)) }}">
                                            <div class="action-item cart-item-remove" id="cart-item-id">Remove</div>											
                                            </a>
											
											@if($item->alter_dress=="yes")								
                                            <span class="prod-alt-link"><a href="#" data-category="25" id="alts-333542" class="action-link custButton alt-edit-link" data-toggle="modal" data-target="#modelId"><span class="symb">✂</span>Make Alterations</a></span>
											@else
											@endif
											
											
											
											
                                            </div>		
                                            </td>
                                            <td>

                                            <input type="number" name="quantity" value="{{$item->itemqty}}" class="form-control cartqty" min="1" max="10" required="" onchange="update_cart({{$item->itemid}},this.value,{{$item->unit_price}})">
                                            
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
				<!--
                    <div class="cart-action-box">
                        <a href="{{ URL('/wishlist')}}" class="btn btn-custom btn-curved btn-wide btn-white">
                            <span class="glyphicon glyphicon-heart"></span> Add from Wishlist
                        </a>
                    </div>
					-->
                    <div class="cart-action-box right">
                        <a href="{{ URL('/checkout')}}" class="btn btn-custom btn-curved btn-wide btn-brand"> 
                        Checkout
                        </a>
                        <small class="tip">Tip: Shop for USD175 &amp; above to avail free shipping</small>
                    </div>
                </div> <!-- ./col -->
            </div>
			
			
			@endif
            
        </div>
    </section>
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                 
                <div class="modal-body p-2 alterations-modal">
                    <div class="modal-header p-0 border-0">
                        
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="https://taruni.in/img/dress-alter.png" alt="Alterations" title="Alterations">
                            </div>
                            <div class="col-md-8">
                                <h3 class="modal-title"><img src="https://taruni.in/img/icn-alteration.png" class="alterations-icn" alt="Alterations" title="Alterations"> Edit Alterations</h3>

                                <form action="" id="dress-alt-form" class="clearfix" method="post" accept-charset="utf-8">
                                    <fieldset>
                                        
                                        <p>Provide <span style="color:red">"Body"</span> Measurements (in Inches)</p>
                                        
                                        <table class="table table-sm alt-table">
                                            <tbody><tr>
                                                <td class="label-td">
                                                    <label for="chest">1. Chest (<span style="color:red; font-weight: normal;">body</span>)</label>
                                                </td>
                                                <td>	
                                                    <input type="text" class="form-control input-sm" name="chest" id="chest" value="Standard">
                                                </td>
                                                
                                                                                            <td class="label-td">
                                                        <label for="waist">2. Waist (<span style="color:red; font-weight: normal;">body</span>)</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control input-sm" name="waist" id="waist" value="Standard">
                                                    </td>
                                                                                        
                                                
                                            </tr>
                                            <tr>
                                                                                            <td class="label-td">
                                                        <label for="hip">3. Hips (<span style="color:red; font-weight: normal;">body</span>)</label>
                                                    </td>
                                                    <td>
                                                        <input id="hip" type="text" class="form-control input-sm" name="hip" value="Standard">
                                                    </td>
                                                                                        
                                                                                            <td class="label-td">
                                                        <label for="dressLength">4. Top Length (<span style="color:blue; font-weight: normal;">dress</span>)</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control input-sm" name="dressLength" id="dressLength" value="Standard">
                                                    </td>
                                                                                    </tr>
                                        </tbody></table>
                                        <input type="hidden" name="cartItemId" id="cartItemId-dress" value="333967">
                                        <div class="form-group cta">
                                            <div id="dress-alt-message"></div>
                                            <p><strong style="color: red;">Note:</strong> Please make sure Chest, Waist and Hip sizes are <strong>"body"</strong> measurements only.</p>
                                            <button type="submit" class="btn btn-primary" id="btnSubmitDressAlt">Submit</button>
                                        </div>
                                        </fieldset>
                                    </form>
                            </div>
                        </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div> -->
            </div>
        </div>
    </div>
@endsection