@extends('frontend.template_v1')
@section('title', 'Home')
@section('content')
<section class="pb-0">
      <div class="container">
        <div class="banner-slider">
        <div>
          <div class="slider-wrapper">
            <img src="{{ URL::to('images/banner-1.jpg')}}" class="img-fluid" alt="Banner image" width="100%">
          </div>
        </div>
        <div>
          <div class="slider-wrapper">
            <img src="{{ URL::to('images/banner-2.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
          </div>
        </div>
        <div>
          <div class="slider-wrapper">
            <img src="{{ URL::to('images/banner-1.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
          </div>
        </div>
        <div>
          <div class="slider-wrapper">
            <img src="{{ URL::to('images/banner-2.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
          </div>
        </div>
        <div>
          <div class="slider-wrapper">
            <img src="{{ URL::to('images/banner-1.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
          </div>
        </div>
        <div>
          <div class="slider-wrapper">
            <img src="{{ URL::to('images/banner-2.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
          </div>
        </div>
      </div>
      <div class="row highlights-row mt-3">
        <div class="col-sm-2 highlights-divider first">
          <div class="wrapper">
            <h3>FREE<br>SHIPPING</h3>
          </div>
        </div>
        <div class="col-sm-2 highlights-divider second">
          <div class="wrapper">
            <p class="mb-0">ACROSS INDIA</p>
              <hr>
              <p class="mb-0">FOR ORDERS<br>US 175$ & ABOVE
            </p>
          </div>
        </div>
        <div class="col-sm-4 highlights-divider">
          <div class="wrapper text-center">
            <h3>NEW USERS<br>WELCOME CODE: WLCM10</h3>
          </div>
        </div>
        <div class="col-sm-4 highlights-divider last">
          <div class="wrapper text-center">
            <h3>ALTERATIONS &<br>CUSTOMIZATION</h3>
          </div>
        </div>
      </div>
      </div>
    </section>
    <section class="pb-0">
      <div class="container">
        <h3>New Arrivals</h3>
        <div class="newarrival-slider">
          <div>
            <div class="slider-wrapper">
			<a href="#">
              <img src="{{ URL::to('images/newarrival-1.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
			  </a>
            </div>
          </div>
          <div>
            <div class="slider-wrapper">
			<a href="#">
              <img src="{{ URL::to('images/newarrival-1.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
			  </a>
            </div>
          </div>
          <div>
            <div class="slider-wrapper">
			<a href="#">
              <img src="{{ URL::to('images/newarrival-1.jpg') }}" class="img-fluid" alt="Banner image" width="100%">
			  </a>
            </div>
          </div>
        </div>
        <div class="shopnow-container text-center mt-3">
          <a href="#" class="shopnow-btn">SHOP NOW</a>
        </div>
      </div>
    </section>

    <section class="pb-0 card-sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="wrapper mb-4">
              <div class="card-img" style="background: url({{ URL::to('images/mix_and_match.jpg') }})top center no-repeat;background-size: cover;height: 500px;">
                <div class="card-content">
                  <h1 class="text-bright">MIX<br> & <br>MATCH</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="wrapper mb-4">
              <div class="card-img" style="background: url({{ URL::to('images/look_book.jpg') }})top center no-repeat;background-size: cover;height: 500px;">
                <div class="card-content">
                  <h1 class="text-bright">LOOK<br>BOOK</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="wrapper mb-4">
              <div class="card-img" style="background: url({{ URL::to('images/whats_in_now.jpg') }})top center no-repeat;background-size: cover;height: 500px;">
                <div class="card-content">
                  <h1 class="text-bright">WHAT'S<br>IN <br>NOW</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="shopnow-container text-center">
          <a href="#" class="shopnow-btn">SHOP NOW</a>
        </div>
      </div>
    </section>

    <section class="fashion-jouranl-sec">
      <div class="container">
        <h3>Fashion Journals</h3>
        <div class="row">
          <div class="col-sm-6 pr-md-0">
            <div class="wrapper mobile-image" style="background: url({{ URL::to('images/fashion_journal.jpg') }}) center center no-repeat; background-size: cover; height: 100%">
              <!--<img src="{{ URL::to('images/fashion_journal.jpg') }}" alt="fashion journal" width="100%">-->
            </div>
          </div>
          <div class="col-sm-6 pl-md-0">
            <div class="wrapper p-5 bg-bright">
              <h4>"MUST HAVE WEDDING OUTFITS FOR BRIDESMAID"</h4>
              <P>28 Aug, 2020</P>
              <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="testimonial-sec">
      <div class="container">
        <h3 class="text-center">Testimonials</h3>
        <div class="testimonial-slider mt-4" id="testimonials">
          <div>
            <div class="slider-wrapper text-center">
              <img src="{{ URL::to('images/testimonial.png') }}" class="img-fluid m-auto" alt="Banner image">
              <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt</p>
              <p>- Name</p>
            </div>
          </div>
          <div>
            <div class="slider-wrapper text-center">
              <img src="{{ URL::to('images/testimonial.png') }}" class="img-fluid m-auto" alt="Banner image">
              <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt</p>
              <p>- Name</p>
            </div>
          </div>
          <div>
            <div class="slider-wrapper text-center">
              <img src="{{ URL::to('images/testimonial.png') }}" class="img-fluid m-auto" alt="Banner image">
              <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt</p>
              <p>- Name</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection