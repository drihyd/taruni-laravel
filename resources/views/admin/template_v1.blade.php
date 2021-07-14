<html class="no-js" lang>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>{{env('APP_NAME')}} - {{$pageTitle??""}}</title>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="robots" content="noodp">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;0,900;1,500&display=swap" rel="stylesheet">
      @stack('styles')
      <link rel="stylesheet" href="{{ URL::to('assets/admin/css/global.css') }}">
      <!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
   </head>
   <body>
      <div class="sidebar-wrapper">
          <!-- Sidebar -->
          @include('admin.common_pages.sidebar')
          
          <!-- Page Content -->
          <div id="content">

              @include('admin.common_pages.nav')
              <div class="paddingleftright">
     <h3>{{$pageTitle??""}}</h3>
 </div>
              @yield('content')
          </div>
      </div>
      @stack('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- CK editor -->
<script type="text/javascript" src="{{ URL::to('assets/admin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/admin/ckeditor/config.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/admin/ckeditor/styles.js') }}"></script>
@include('admin.common_pages.functions_js')
    
    
   </body>
</html>