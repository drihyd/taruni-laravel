@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')
<section>
      <div class="container">
	  
	  <h2 class="smaller margin-top-30">{{$pageTitle}}</h2>
        <div class="row">
          <div class="col-sm-3">
		  
		  
		   @include('frontend.common_pages.products_filters')
		  
		  
             
              
          </div>
          <div class="col-sm-9">
		  
		  	<div class="products-grid clearfix" id="products-area">
			
			
			
				@include('frontend.product_card')
			
          
			
			 </div>
			
			
          </div>
        </div>
      </div>
    </section>
@endsection