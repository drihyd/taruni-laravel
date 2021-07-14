@extends('frontend.template_v1')
@section('title', "Razorpay")
@section('content')

@php
use App\Models\Cart;
use App\Models\Cart_details;
$Cart_total_sum=Cart_details::select('*')->where('cart_id',session()->get('cart'))->sum('price');
$Cart_details_count=Cart_details::select('*')->where('cart_id',session()->get('cart'))->count();
@endphp

<section class="chekout-steps-sec">
<div class="container">
<div class="row">
<div class="col-sm-8">



                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif
                            <div class="alert alert-success success-alert alert-dismissible fade show" role="alert" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> <span class="success-message"></span>
                            </div>
                        {{ Session::forget('success') }}
                        <div class="card card-default">
                            <div class="card-header">
                                Your selected Payment gateway is Razorpay
                            </div>
							
							

                            <div class="card-body text-center">
                                <div class="form-group mt-5 mb-5">
                                    <input type="hidden" name="amount" class="form-control amount" placeholder="Enter Amount" value="{{$Cart_total_sum}}">
                                </div>
                                <button id="rzp-button1" class="btn btn-custom btn-curved btn-wide btn-brand">Pay</button>
                            <br><br>
							</div>
                        </div>
						
						
        
 






</div>

<div class="col-sm-4">				
                    @include('frontend.cart_summary')						
                    </div>	
</div>
</div>
</section>
@endsection


