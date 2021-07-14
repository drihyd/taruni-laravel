@extends('frontend.template_v1')
@section('title', 'Registraton')
@section('content')
 <section class="info sec-login">
      <div class="container">
 
		 <form  action="{{ route('register.customer') }}" method="POST" role="form" class="needs-validation">
		  @csrf
            <div class="form-container">
              <h2 class="form-title">
                <!-- <hr> -->
                <span>Sign Up</span>
              </h2>

              <div class="form-social-wrap form-inline">
               <!-- <button class="btn btn-default default-facebook btn-block with-icon"><i class="fab fa-facebook-square icon facebook"></i>Facebook</button>-->
			   
<a class="btn btn-default default-google btn-block mt-4 with-icon" href="{{ URL('/login/google')}}" role="button"><i class="fab fa-google icon google"></i>Gmail</a>
              </div>

              <div class="form-title-small"><span>OR</span></div>

              <div class="form-wrap">
                <div class="row">
                    <div class="col">
                        <label for="log-email">Firstname</label>
                        <div class="form-group">
				<input name="firstname" type="text" class="form-control"   placeholder="Firstname" required="required">
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">Lastname</label>
                        <div class="form-group">
                            <input name="lastname" type="text" class="form-control"   placeholder="Lastname" required="required">
                          </div>
                    </div>
                </div>
                <label for="log-email">Enter Email</label>
                <div class="form-group">
                  <input name="email" type="email" class="form-control"   placeholder="Email" required="required">
                  <span class="valid-feedback">Looks good!</span>
                  <span class="invalid-feedback"> choose a username.</span>
                </div>

                <label for="log-email">Enter Password</label>
                <div class="form-group pass_show">
                  <input name="password" type="password" class="form-control"  pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.cpassword.pattern = this.value;" placeholder="Password" required>
                </div>

                <label for="log-email">Confirm Password</label>
                <div class="form-group pass_show">
                  <input name="cpassword" type="password" class="form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Confirm Password" required>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="log-email">Select Gender</label>
                        <div class="form-group">
                            <select class="form-control custom-select" name="gender"  required="required">
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">Mobile number</label>
                        <div class="form-group">
                            <input pattern="[6789][0-9]{9}" type="text" name="mobile" class="form-control"  placeholder="Phone" required>
                          </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-brand btn-block mt-4">Log in to Continue</button>
                <div class="row m-0 justify-content-center mt-3">
                  <span class="text-small text-right">Already have an account?
                    <a href="{{ URL('/myaccount')}}" class="cta">Sign In!</a></span>
                </div>
              </div>

            </div>
          </form>
        
      </div>
    </section>

@endsection