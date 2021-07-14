<html class="no-js" lang>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{env('APP_NAME')}} - @yield('title')</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noodp">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;0,900;1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
@stack('styles')<!-- To include style links -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/global.css') }}"> 
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/login.css') }}"> 
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/myaccount.css') }}"> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
.overlay{
    display: none;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 999;
    background: rgba(255,255,255,0.8) url("loader.gif") center no-repeat;
}
/* Turn off scrollbar when body element has the loading class */
body.loading{
    overflow: hidden;   
}
/* Make spinner image visible when body element has the loading class */
body.loading .overlay{
    display: block;
}
</style>


</head>
<body class="bg-homebrand">
<!--<body class="{{ (request()->is('/')) ? 'bg-homebrand' : '' }}">-->
<!-- Includes parent sidebar -->
@include('frontend.common_pages.nav')
<div class="container">
@yield('content')
</div>
@include('frontend.common_pages.footer')
@stack('scripts') <!-- To include script links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@include('frontend.common_pages.functions_js')

<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif
  
    @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
  
  

  
</script>



</body>
</html>