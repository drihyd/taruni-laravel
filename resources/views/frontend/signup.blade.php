@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')
 <section class="info sec-login">
      <div class="container">

		 <form  action="{{ route('register.login') }}" method="POST" role="form" class="needs-validation">
 @csrf           
		   <div class="form-container">
              <h2 class="form-title">
                <!-- <hr> -->
                <span>Login</span>
              </h2>

              <div class="form-social-wrap form-inline">
	<!--		  
<a href="{{ URL ('/login/facebook') }}" >		  
<button class="btn btn-default default-facebook btn-block with-icon">
<i class="fab fa-facebook-square icon facebook"></i>Facebook
</button>
</a>
-->


			
			<a class="btn btn-default default-google btn-block mt-4 with-icon" href="{{ URL('/login/google')}}" role="button"><i class="fab fa-google icon google"></i>Gmail</a>
			

			  
                
              </div>

              <div class="form-title-small"><span>OR</span></div>

              <div class="form-wrap">

                <label for="log-email">Enter Email</label>
                <div class="form-group">
                  <input name="email" type="email" class="form-control" id="log-email" value="" placeholder="Email" required>
                  <span class="valid-feedback">Looks good!</span>
                  <span class="invalid-feedback">Please enter Email ID</span>
                </div>

                <label for="log-email">Enter Password</label>
                <div class="form-group pass_show">
                  <input name="password" type="password" class="form-control" id="log-password" value="" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-brand btn-block mt-4">Log in to Continue</button>
                <div class="row m-0 justify-content-between mt-3">
                  <span class="text-small"><a href="{{ URL('/reset_password')}}" class="cta">Forgot Password?</a></span>
                  <span class="text-small text-right">New User ? <a href="{{ URL('/registration')}}" class="cta">Create an Account</a></span>
                </div>
              </div>

            </div>
          </form>
        
      </div>
    </section>

@endsection