<header class="main-header">
      <div class="container">
        <div class="text-center mt-3">
          <a href="{{ URL('/')}}"><img src="{{ URL::to('images/logo.svg')}}" alt="Taruni Logo" class="img-fluid nav-logo"></a>
        </div>
        <div class="cart-wrapper">
            <!-- <div class="search-container">
              <form action="/search" method="get">
                <input class="search" id="searchleft" type="search" name="q" placeholder="Search">
                <label class="button searchbutton" for="searchleft"><span class="mglass">&#9906;</span></label>
              </form>
            </div> -->
              <a href="{{ URL('/search')}}" class="mr-3"><img src="{{ URL::to('images/search.svg')}}" alt="search" class="img-fluid"></a>
              <a href="{{ URL('/cart')}}" class="mr-3 pos-relative"><img src="{{ URL::to('images/cart.svg')}}" alt="Cart" class="img-fluid">
			@if(isset($cartCount) && $cartCount>0)
				<span class="item-count cart-count" id="nav_no_cart_items">
			{{$cartCount??''}}
			</span>
			@else
			@endif
			  </a>
				
		
			  
              <a href="{{ URL('/wishlist')}}" class="pos-relative"><img src="{{ URL::to('images/wishlist.svg')}}" alt="wishlist" class="img-fluid">
			  
			  
			  
			@if(isset($wishlistsCount) && $wishlistsCount>0)
			<span class="item-count" id="nav_no_cart_items">
			{{$wishlistsCount??''}}
			</span>
			@else
			@endif

			  
			  </a>
        </div>
		
		@php
		use App\Models\Categories;
		$Categories=Categories::where("parent_id",'0')->wherenotin("slug",['sandals','accessories','kids-wear','bags','bangles','offers','discounts','mix-and-match'])->orderBy('name', 'ASC')->get();
		@endphp
		
		
         <nav class="navbar navbar-expand-lg navbar-light p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
				
					<li class="nav-item dropdown active">
						<a class="nav-link link-about dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Women
						</a>
							<div class="dropdown-menu navitem-submenu" aria-labelledby="navbarDropdownMenuLink">							
								@foreach ($Categories as $category)
								<a class="dropdown-item" href="{{ URL('/category/'.$category->slug)}}">{{ucfirst(trans($category->name))}}</a>
								@endforeach
							</div>
					</li>
					
					
					<li class="nav-item">
                    <a class="nav-link link-about " href="{{ URL('/category/kids-wear')}}" id="navbarDropdownMenuLink"  aria-haspopup="true" aria-expanded="false">
                    Kids
                    </a>
					</li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link link-about dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accessories
                    </a>
                    <div class="dropdown-menu navitem-submenu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ URL('/category/accessories')}}"">Jewellery</a>
                      <a class="dropdown-item" href="{{ URL('/category/bags')}}"">Bags</a>
                      <a class="dropdown-item" href="{{ URL('/category/bangles')}}"">Bangles</a>
                      <a class="dropdown-item" href="{{ URL('/category/sandals')}}"">Sandals</a>
                    </div>
                </li>
				
					<li class="nav-item">
                    <a class="nav-link link-about " href="{{ URL('/category/collections')}}" id="navbarDropdownMenuLink"  aria-haspopup="true" aria-expanded="false">
                    Collections
                    </a>
					</li>
					  
				  
                  <div class="account-wrapper">
				  
				  
                    <li class="nav-item mb-sm-0">
						@if (Auth::check())                     
					<a class="nav-link" href="{{ route('register.logout')}}"> Logout</a>
					@else
					 <a class="nav-link" href="{{ route('customer.signin')}}">Login / My Account</a>
					 @endif
                  </li>
                  <li class="nav-item mb-sm-0">
                    <a class="nav-link" href="{{ URL('/sale')}}">Sale</a>
                  </li> <li class="nav-item mb-sm-0">
                    <a class="nav-link" href="{{ URL('/help')}}">Help</a>
                  </li>
				  <!--
                  <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/contactus')}}">Contact Us</a>
                  </li>
				  -->
				  
				   @if (Auth::check()) 
				   <!--
				   <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.myaccount')}}">Myaccount</a>
					</li>
					-->
					@else				
					 @endif
				  
				 
                  </div>
                </ul>
              </div>
      </nav>
      </div>
    </header>