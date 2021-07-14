@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')
<section>
      <div class="container">
	  
	  <h2 class="smaller margin-top-30">{{$pageTitle}} </h2>
        <div class="row">
          <div class="col-sm-3">
              <div id="product-fliter">
                  <h3>Ghararas</h3>
              <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Fabric
                        </button>
                      </h5>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="new">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="new">Silk</label>
                          </div>
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="used">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="used">Chanderi</label>
                          </div>
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="collectible">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="collectible">Cotton</label>
                          </div>
                          <div class="form-check mb-3 pb-1">
                            <input type="checkbox" class="form-check-input filled-in" id="renewed">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="renewed">Reyon silk</label>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Color
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="new">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="new">Green</label>
                          </div>
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="used">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="used">Yellow</label>
                          </div>
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="collectible">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="collectible">Grey</label>
                          </div>
                          <div class="form-check mb-3 pb-1">
                            <input type="checkbox" class="form-check-input filled-in" id="renewed">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="renewed">Olive green</label>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Price Range
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                          <div class="slider-price d-flex align-items-center my-4">
                            <span class="font-weight-normal small text-muted mr-2">Rs.0</span>
                            <form class="multi-range-field w-100 mb-1">
                              <input id="multi" class="multi-range" type="range" />
                            </form>
                            <span class="font-weight-normal small text-muted ml-2">Rs.5000</span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Size
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                       <div class="filter-wrapper">
                        <div class="btn-group size-filter filter-checkboxes-2" data-toggle="buttons">
                            <label class="btn btn-size-select btn-xs " title="m: Available">
                            <input type="checkbox" name="sizes[]" value="m" id="size_m" autocomplete="off">M</label>
                                              <label class="btn btn-size-select btn-xs " title="l: Available">
                            <input type="checkbox" name="sizes[]" value="l" id="size_l" autocomplete="off">L</label>
                                              <label class="btn btn-size-select btn-xs " title="xl: Available">
                            <input type="checkbox" name="sizes[]" value="xl" id="size_xl" autocomplete="off">XL</label>
                                              <label class="btn btn-size-select btn-xs " title="xxl: Available">
                            <input type="checkbox" name="sizes[]" value="xxl" id="size_xxl" autocomplete="off">XXL</label>
                                              <label class="btn btn-size-select btn-xs " title="free: Available">
                            <input type="checkbox" name="sizes[]" value="free" id="size_free" autocomplete="off">FREE</label>          
                        </div>                
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                </div>
              
          </div>
          <div class="col-sm-9">
            <div class="row">
			
		
			
			
			@if($Products)
			@foreach ($Products as $product)
			@php
			$price=$product['images'][0]->pprice??0;
			@endphp
			
			@if($price>0)
              <div class="col-sm-4 col-6">
                  
                <div class="product-wrapper">
                    
                <a href="{{ URL('/product/'.$product->slug)}}">
                  <div class="text-center product-img">
                    <img src="{{env('BASE_URL').$product->code.'_dp.jpg'}}" alt="product" class="img-fluid">
                    <!--<img src="{{URL::asset('assets/uploads/'.$product->code.'_dp.jpg')}}" alt="product" class="img-fluid mb-3">-->
                    <!--<img src="{{URL::asset('assets/img/product-1.jpg')}}" alt="product" class="img-fluid mb-3">-->
                  </div>
                  <p class="text-black mt-3"><b>INR {{$price}}/-</b></p>
                  <p class="small">{{Str::ucfirst($product->name)}}</p>
                  
                </a>
                <div class="cartwish-select">
                    <a href="{{ URL('/product/'.$product->slug)}}"><i class="fas fa-shopping-cart float-left"></i></a>
                    <a href="{{ route('wishlist.store', Crypt::encryptString($product->id))}}"><i class="fas fa-heart float-right"></i></a>
                </div>           
                </div>
              </div>
			  @else
			   @endif
			  @endforeach
			  @else			  
			  @endif
			  
              
			  
			  
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection