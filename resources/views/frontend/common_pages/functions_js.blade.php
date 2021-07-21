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
		   
		

/* $(document).ajaxSend(function(){
	

	$.LoadingOverlay("show",
	{

	size:4,
	background  : "rgba(253, 236, 237, 0.5)"

	}

	);
	
	
	}); */

		
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
	
	<script>
	
	$(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 1,
        max: 10000,
        from: 1,
        to: 10000,
        grid: true
    });
	



	
	
	
	
	
	
	</script>
	
		<script>
		
		
	$("#ajaxfilter").change(function(e) {
		
		

	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
			var element = this;
			var heightPreserve = $("#products-grid").closest(".col-xs-12").css('height');
			
			$("#products-grid").append("<div style='width: 100%; position: absolute; left: 0; text-align: center; top: 200px;margin: 0 auto;'><i class='products-loader fa fa-spinner fa-spin'></i></div>");
			
			var filters = [];
			var postData = $(this).serializeArray();
			
			
		
	

			$.each(postData, function(key, value) {
				if(filters[value['name']] == undefined){
					filters[value['name']] = [];
				}
				filters[value['name']].push(value['value']);
			});

			if (searchTerm) { 
				filters['searchTerm'] = searchTerm;
			}

			var sizes = '';
			var searchTerm = '';
			var categories = '';
			var colors = '';
			var fabrics = '';
			var tags = '';
			var cuts = '';
			var minprice = '';
			var maxprice = '';
				var currency = 'usd';
					     
			var sort_by = '';
			
			//queryString = window.location.search;
			
			var temp = {};



        value = $("#rangePrimary").prop("value").split(";");
		
        var minprice = value[0];
        var maxprice = value[1];
		

			var queryString = '';
			if(queryString == '') {
				queryString = '?';
			}		
			
			if(filters['searchTerm'] !== undefined) {
				searchTerm = filters['searchTerm'].join(',');
				temp['searchTerm'] = searchTerm;
				// queryString += '&searchTerm=' + searchTerm;
			}
			
			if(filters['categories[]'] !== undefined) {
				categories = filters['categories[]'].join(',');
				temp['categories'] = categories;
				// queryString += '&categories=' + categories;
			}
			
			if(filters['sizes[]'] !== undefined) {
				sizes = filters['sizes[]'].join(',');
				temp['sizes'] = sizes;
				// queryString += '&sizes=' + sizes;
			}
			
			if(filters['colors[]'] !== undefined) {
				colors = filters['colors[]'].join(',');
				temp['colors'] = colors;
				// queryString += '&colors=' + colors;
			}
			
			
			
		
			if(filters['fabrics[]'] !== undefined) {
				fabrics = filters['fabrics[]'].join(',');
				temp['fabrics'] = fabrics;
				// queryString += '&fabrics=' + fabrics;
			}
			
			if(filters['cuts[]'] !== undefined) {
				cuts = filters['cuts[]'].join(',');
				temp['cuts'] = cuts;
				// queryString += '&cuts=' + cuts;
			}
			if(filters['tags[]'] !== undefined) {
				tags = filters['tags[]'].join(',');
				temp['tags'] = tags;
				// queryString += '&tags=' + tags;
			}
			
			
			
			if(filters['my_range'] !== undefined) {
				minprice = filters['my_range'].join(',');
				temp['minprice'] = minprice;
				// queryString += '&minprice=' + minprice;
			}
			
			if(filters['my_range'] !== undefined) {
				maxprice =  filters['my_range'].join(',');
				temp['maxprice'] = maxprice;
				// queryString += '&maxprice=' + maxprice;
			}
			
			if(filters['currency'] !== undefined) {
				currency = filters['currency'].join(',');
				// queryString += '&currency=' + maxprice;
			}

			if(filters['currency'] !== undefined) {
				currency = filters['currency'].join(',');				
				// queryString += '&currency=' + maxprice;
			}

			if(filters['sort_by'] !== undefined) {
				sort_by = filters['sort_by'];	
				temp['sort_by'] = sort_by;			
				// queryString += '&currency=' + maxprice;
			}
			
			if(filters['cat_slug'] !== undefined) {
				cat_slug = filters['cat_slug'];	
				temp['cat_slug'] = cat_slug;			
				// queryString += '&currency=' + maxprice;
			}

			// temp['currency'] = currency;
		
			queryString = '?'+jQuery.param( temp );
			

			// console.log(window.location.hostname + window.location.pathname + queryString);
			window.history.pushState('obj', 'newtitle', window.location.pathname + queryString);
			
			var formURL = $(this).attr("action");
			$.ajax({
				url : formURL,
				type: "POST",
				data : postData,			
				success:function(data, textStatus, jqXHR) {		
	

					//console.log(data);
					// console.log(data);
					$("#products-area").html(data); 
					//adjust_productsGrid(); 
					//$("#products-grid").append("<div style='position: absolute; left: 0; width: 100%; text-align: center; top: 200px;'><i class='products-loader fa fa-spinner fa-spin'></i></div>");
					//$(".products-loader").fadeOut();
					//$.LoadingOverlay("hide");
				},
				error: function(jqXHR, textStatus, errorThrown) {
					//console.log(errorThrown);
					//alert('Not available');
					toastr.error('Not available');
					//$(this.form).empty();
					//$(this.form).html(errorThrown);
				}
			});
			e.preventDefault(); //STOP default action
		});
</script>

<script>



</script>