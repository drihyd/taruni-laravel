<script>
    $('#zoom_01').elevateZoom({
    gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
       }); 
</script>
<script>
      $('.banner-slider').slick({
            slidesToShow: 2, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]
           });
		   
      $('.newarrival-slider').slick({

            slidesToShow: 1, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]

           });

      $('.testimonial-slider').slick({

            slidesToShow: 1, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]

           });
    </script>
	
	
	<script>
      $('.look-slider').slick({

            slidesToShow: 4, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:false,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
              }
            }
          ]

           });
      $('.productslike-slider').slick({

            slidesToShow: 4, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:false,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
              }
            }
          ]

           });
		   
		

$(document).ajaxSend(function(){
	$.LoadingOverlay("show",
	{
	//image       : "",
	//fontawesome : "fa fa-cog fa-spin",
	size:4,
	background  : "rgba(253, 236, 237, 0.5)"

	}

	);
	
	
	});

		
function update_cart(itemid,qty,unitprice){
	
	
	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };



        var url = "{{ route('checkout.cart.update', Crypt::encryptString("+itemid+")) }}";
	     var id= 
		$.ajax({
			url: url,
			type: "post",
			cache: false,
			data:{
                _token:'{{ csrf_token() }}',
				itemid: itemid,
				quantity: qty,
				unitprice: unitprice,

			},
			success: function(dataResult){
	 		
		      if(dataResult.statusCode==200)
             {
				 
				toastr.success(dataResult.success);
		
	window.location = "{{ route('orders.show_cart')}}"; 
				
					 
						
             }
             else{
 		 
				 
					 toastr.error(dataResult.error);
             }
				
			}
		});
}





$(document).ajaxStop(function(){
  $.LoadingOverlay("hide");
});
 </script>
 
 <script>


   $(document).ready(function() {
         
        $('body').on('click','#rzp-button1',function(e){
            e.preventDefault();
            var amount = $('.amount').val();
            var total_amount = amount * 100;
            var options = {
                "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
                "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                "currency": "INR",
                "name": "Pay to purchase order",
                "description": "",
                "image": "https://www.taruni.in/assets/logo/taruni-logo-149x44pixles-01.png",
                "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{ route('payment') }}",
                        data:{razorpay_payment_id:response.razorpay_payment_id,amount:amount},
                        success:function(data){							
			
                            $('.success-message').text(data.success);
                            $('.success-alert').fadeIn('slow', function(){
                               $('.success-alert').delay(5000).fadeOut(); 
                            });
                            $('.amount').val('');
                        }
                    });
                },
                "prefill": {
                    "name": "<?php echo Auth::user()->firstname??'' ?>",
                    "email": "<?php echo Auth::user()->email??'' ?>",
                    "contact": "<?php echo Auth::user()->phone??'' ?>"
                },
                "notes": {
                    "address": "test test"
                },
                "theme": {
                    "color": "#292D2F"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
		 });
    </script>