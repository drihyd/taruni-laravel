  <div class="row">
			
			@if($Products)
			@foreach ($Products as $product)
		
			
		
              <div class="col-sm-4 col-6">
                  
                <div class="product-wrapper">
                    
                <a href="{{ URL('/product/'.$product->slug)}}">
                  <div class="text-center product-img">
                    <img src="{{env('BASE_URL').$product->code.'_dp.jpg'}}" alt="product" class="img-fluid">
                   
                  </div>
                  <p class="text-black mt-3"><b>INR {{$product->pprice}}/-</b></p>
                  <p class="small">{{Str::ucfirst($product->name)}}</p>
                  
                </a>
                <div class="cartwish-select">
                    <a href="{{ URL('/product/'.$product->slug)}}"><i class="fas fa-shopping-cart float-left"></i></a>
                    <a href="{{ route('wishlist.store', Crypt::encryptString($product->id))}}"><i class="fas fa-heart float-right"></i></a>
                </div>           
                </div>
              </div>
			
			  @endforeach
			  @else			  
			  @endif
			  
              
			  
			  
            </div>