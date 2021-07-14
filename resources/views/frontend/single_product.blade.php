@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')

<section>
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="row">
			
			@if($Products)				
				@foreach ($Products as $product)
				@foreach ($product->images as $pimg)		
				<div class="col-6 mb-3">
				<img src="{{env('BASE_URL').$product->pcode.'_'.$loop->iteration.'.jpg'}}" alt="product image" class="img-fluid">
				</div>             
				@endforeach			  
				@endforeach			  
			  @else			  
			  @endif
            </div>
          </div>
          <div class="col-sm-6">
		  
		  
		  @if($Products)
			@foreach ($Products as $product)
  		  
            <div class="wrapper">
              <p class="small mb-1">Product Code: {{Str::ucfirst($product->pcode)}}</p>
              <h3>INR {{$product->pprice}}.00/-</h3>
              <div class="product-details">
                <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
				@csrf
                  <div class="row mt-4">
                    <div class="col-2">
                      <p class="mt-2 label">QUANTITY</p>
                    </div>
                    <div class="col-1">
                      <p class="mt-2">:</p>
                    </div>
                    <div class="col-9">
                      <input type="number" name="qty" id="qty" class="btn size-btn" value="1" min="1" max="10">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2">
                      <p class="mt-2 label">SIZE</p>
                    </div>
                    <div class="col-1">
                      <p class="mt-2">:</p>
                    </div>
                    <div class="col-9">
					
					<div class="btn-group" data-toggle="buttons">
					
					@if($Products)				
					@foreach ($Products as $product)
					@foreach ($product->images as $pimg)		
					  <label class="btn size-btn">
                        <input required type="radio" name="sku" value="{{$pimg->size}}" id="size-s" autocomplete="off"> {{Str::upper(str_replace('-', '_',trim($pimg->size)))}}                
                      </label>           
					@endforeach			  
					@endforeach			  
					@else			  
					@endif
                    </div>
               
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2 pr-0">
                      <p class="mt-2 label">SIZE CHART</p>
                    </div>
                    <div class="col-1">
                      <p class="mt-2">:</p>
                    </div>
                    <div class="col-9">
                      <label class="btn size-btn">
                        <input type="radio" name="sku" value="S" id="size-s" autocomplete="off"> S                
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2">
                      <p class="label">COLOR</p>
                    </div>
                    <div class="col-1">
                      <p class="">:</p>
                    </div>
                    <div class="col-9">
                      <label class="btn color-btn color-red">
                        <input type="radio" name="color" value="" id="color-red" autocomplete="off">
                      </label>
                      <label class="btn color-btn color-yellow">
                        <input type="radio" name="color" value="" id="color-yellow" autocomplete="off">
                      </label>
                      <label class="btn color-btn color-green">
                        <input type="radio" name="color" value="" id="color-green" autocomplete="off">
                      </label>
                      <label class="btn color-btn color-blue">
                        <input type="radio" name="color" value="" id="color-blue" autocomplete="off">
                      </label>
                      <label class="btn color-btn color-skyblue">
                        <input type="radio" name="color" value="" id="color-skyblue" autocomplete="off">
                      </label>
                    </div>
                  </div>
                  <p class="small mt-3 mb-0">*Sizes can be altered by 1 inch. *Dress Length: 58 inches</p>
                  <p class="small">*Sleeve: Netted(3/4th sleeves - 16 inches only)</p>
                  <div class="row mt-3">
                    <div class="col-3 pr-0">
                      <p class="label mb-0">ATTACH SLEEVE?</p>
                    </div>
                    <div class="col-9">
                      <label class="mr-3">
                        <input type="radio" name="attachSleeves" value="yes" id="attachSleeves" autocomplete="off" class="radio-btn">Yes
                      </label>
                      <label>
                        <input type="radio" name="attachSleeves" value="no" id="attachSleeves" autocomplete="off" class="radio-btn" checked>No
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <p class="label mb-0">ALTERATIONS</p>
                    </div>
                    <div class="col-9">
                      <label class="mr-3">
                        <input type="radio" name="alterations" value="yes" id="alterationsyes" autocomplete="off" class="radio-btn">Yes
                      </label>
                      <label>
                        <input type="radio" name="alterations" value="no" id="alterationsno" autocomplete="off" class="radio-btn" checked>No
                      </label>
                    </div>
                  </div>
                  <p class="small mt-2 mb-0 text-danger">*Sizes can be altered by 1 inch. *Dress Length: 58 inches</p>
                  <p class="small text-danger">*Sleeve: Netted(3/4th sleeves - 16 inches only)</p>

                  <div class="submit-btns mt-3">
                    <p class="mb-0 label">IN STOCK</p>
					

					 <button type="submit" class="btn btn-submit"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                    <a href="{{ route('wishlist.store', Crypt::encryptString($product->pid))}}" class="btn btn-submit"><i class="fas fa-heart"></i> Wishlist</a>
                    <a href="#" class="btn btn-submit">Notify Me</a>
					  </div>
					  
					
					  

		<input type="hidden" name="productId" value="{{ $product->pid }}">
		<input type="hidden" name="price" id="finalPrice" value="{{ $product->pprice != '' ? $product->pprice : $product->pprice }}">
		<input type="hidden" name="skuid" id="skuid" value="{{ $product->skuid}}">
							
							
                </form>
                <div class="mt-3">
                  <div id="accordion" class="product-accordion">
                    <div class="card">
                      <div class="card-header p-0" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link p-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            PRODUCT DETAILS
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body p-0 pt-2">
                          <b>SKU:</b> TWAK16 <b>PARENT CATEGORY:</b> ANARKALI <b>CATEGORY:</b> PARTY WEAR ANARKALI
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <div id="accordion" class="product-accordion">
                    <div class="card">
                      <div class="card-header p-0" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link p-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            WASH INSTRUCTIONS
                          </button>
                        </h5>
                      </div>

                      <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body p-0 pt-2">
                          <b>SKU:</b> TWAK16 <b>PARENT CATEGORY:</b> ANARKALI <b>CATEGORY:</b> PARTY WEAR ANARKALI
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="shipping-details mt-3">
                  <div class="row border-top border-bottom pt-3">
                    <div class="col-sm-6 pr-sm-0">
                      <p class="small">FREE Shipping Across India</p>
                      <p class="small">PAY Securely via PayPal, Debit & Credit Cards</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="small mb-0"><b>Shipping Times:</b> 1 Week Delivery in India.</p>
                      <p class="small">10 Day Delivery Worldwide Cash On Delivery in selected locations across India.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
			  @endforeach
			  @else			  
			  @endif
			
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <h3>Complete your look</h3>
        <div class="look-slider">
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-1.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-2.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-3.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-4.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-1.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
        </div>
        <div class="shopnow-container text-center mt-3">
          <a href="#" class="shopnow-btn">SHOP NOW</a>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <h3>Products You May Also Like</h3>
        <div class="productslike-slider mt-4">
          <div>
            <div class="look-wrapper">
                <div class="productsmaylike product-img">
                  <img src="{{ URL::to('images/pmaylike-1.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
                  <div class="cartwish-select">
                    <a href=""><i class="fas fa-shopping-cart"></i></a>
                    <a href=""><i class="fas fa-heart float-right"></i></a>
                  </div>
                </div>
                <p class="text-black"><b>INR 2500/-</b></p>
                <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
              </div>
          </div>
          <div>
            <div class="look-wrapper">
                <div class="productsmaylike product-img">
                  <img src="{{ URL::to('images/pmaylike-2.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
                  <div class="cartwish-select">
                    <a href=""><i class="fas fa-shopping-cart"></i></a>
                    <a href=""><i class="fas fa-heart float-right"></i></a>
                  </div>
                </div>
                <p class="text-black"><b>INR 2500/-</b></p>
                <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
              </div>
          </div>
          <div>
            <div class="look-wrapper">
                <div class="productsmaylike product-img">
                  <img src="{{ URL::to('images/pmaylike-3.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
                  <div class="cartwish-select">
                    <a href=""><i class="fas fa-shopping-cart"></i></a>
                    <a href=""><i class="fas fa-heart float-right"></i></a>
                  </div>
                </div>
                <p class="text-black"><b>INR 2500/-</b></p>
                <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
              </div>
          </div>
          <div>
            <div class="look-wrapper">
                <div class="productsmaylike product-img">
                  <img src="{{ URL::to('images/pmaylike-4.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
                  <div class="cartwish-select">
                    <a href=""><i class="fas fa-shopping-cart"></i></a>
                    <a href=""><i class="fas fa-heart float-right"></i></a>
                  </div>
                </div>
                <p class="text-black"><b>INR 2500/-</b></p>
                <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
              </div>
          </div>
          <div>
            <div class="look-wrapper">
                <div class="productsmaylike product-img">
                  <img src="{{ URL::to('images/pmaylike-1.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
                  <div class="cartwish-select">
                    <a href=""><i class="fas fa-shopping-cart"></i></a>
                    <a href=""><i class="fas fa-heart float-right"></i></a>
                  </div>
                </div>
                <p class="text-black"><b>INR 2500/-</b></p>
                <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
              </div>
          </div>
        </div>
        <div class="shopnow-container text-center mt-3">
          <a href="#" class="shopnow-btn">SHOP NOW</a>
        </div>
      </div>
    </section>

@endsection