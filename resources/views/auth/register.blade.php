
@php
use PragmaRX\Countries\Package\Countries;
@endphp

@extends('layouts.app')

@section('content')
<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="card ">
				<div class="card-header">{{ __('Register') }}</div>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('register') }}" >
						@csrf
						
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group required row">
									<label for="first_name" class="col-md-4 col-form-label text-md-left">{{ __('First name ') }}</label>

									<div class="col-md-8">
										<input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

										@if ($errors->has('first_name'))
											<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('first_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group required row">
										<label for="last_name" class="col-md-4 col-form-label text-md-left">{{ __('Last name ') }}</label>

										<div class="col-md-8">
											<input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

											@if ($errors->has('last_name'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('last_name') }}</strong>
												</span>
											@endif
										</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group required row">
									<label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email ') }}</label>

									<div class="col-md-8">
										<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

										@if ($errors->has('email'))
											<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group required row">
									<label for="sex" class="col-md-4 col-form-label text-md-left">{{ __('Sex ') }}</label>

									<div class="col-md-8">
										<select name="sex" id="sex" class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" value="{{ old('sex') }}" required>
											<option value="1">Male</option>
											<option value="2">Female</option>
											<option value="0" selected>Not known</option>
											<option value="9">Prefer not to say</option>
										</select>

										@if ($errors->has('sex'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('sex') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group required row">
									<label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password ') }}</label>

									<div class="col-md-8">
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group required row">
									<label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password ') }}</label>

									<div class="col-md-8">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-sm-6">
								<div class="form-group required row">
									<label for="birthdate" class="col-md-4 col-form-label text-md-left">{{ __('Birthdate ') }}</label>

									<div class="col-md-8">
										<input type="date" class="form-control" name="birthdate" id="birthdate" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') }}" required />

										@if ($errors->has('birthdate'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('birthdate') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group required row">
									<label for="country" class="col-md-4 col-form-label text-md-left">{{ __('Country ') }}</label>

									<div class="col-md-8">
										<select name="country" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}" required>
											@php
											$countries = Countries::all()->pluck('name.common');
											foreach ($countries as $key => $country) {
													echo "<option value='$country'>$country</option>";
											}
											@endphp

										</select>

										@if ($errors->has('country'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('country') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
						</div>

            <div class="row justify-content-center">
				<div class="col-md-4 text-md-left vertical">Profile picture</div>
				
				<div class="col-md-8 form-group">      
					<div class="p-image">
						<i class="fa fa-camera upload-button">
							<div class="circle">
							<!-- User Profile Image -->
							<img class="profile-pic" src="https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwizkY6O1pbjAhVLUxoKHZ_RC8gQjRx6BAgBEAU&url=http%3A%2F%2Frollacosta.in%2Fabout-us%2Fdummy-pic%2F&psig=AOvVaw0A08ZQ8foUzRsXOuXFgz3A&ust=1562171860528865">
						
							<!-- Default Image -->
							<!-- <i class="fa fa-user fa-5x"></i> -->
							</div>
						</i>
						<input class="file-upload" id="profile_photo_path" name="profile_photo_path" value="{{ old('profile_photo_path') }}" type="file" accept="image/*"/>
					</div>
					<div class="invalid-feedback">
						@if ($errors->has('profile_photo_path'))
							<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('profile_photo_path') }}</strong>
							</span>
						@endif
					</div>
            	</div>
            </div>							
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group required row">
                    <label for="accept_terms" class=" col-md-6 col-form-label text-md-left">{{ __('I agree to the ') }}<a href="https://en.wikipedia.org/wiki/GNU_General_Public_License" target="_blank">Terms </a></label>
                    <div class="col-md-4">
                      <input type="checkbox" id="accept-terms" class="col-md-2 form-control" name="accept_terms" required/>
  
                      @if ($errors->has('accept_terms'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('accept_terms') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

						<!--Errors-->
						<div class="row">
								@if ($errors->any())    
								<ul>
								@foreach ($errors->all() as $error)
									<li class='alert-danger'>{{ $error }}</li>
								@endforeach
								</ul>
								@endif
						</div>


						<div class="form-group required row mb-0 justify-content-center">
							<button type="submit" class="btn btn-lg btn-primary">
								{{ __('Sign up') }}
							</button>
						</div>
						<hr>
						<div class="fform-group required row mb-0 justify-content-center">
							<a href="{{ url('/login/google') }}" class="btn btn-github "><i class="fab fa-google"></i> Google</a>

							<a href="{{ url('/login/facebook') }}" class="btn btn-facebook " class="btn btn-facebook"><i class="fab fa-facebook"></i> Facebook</a>
						</div>
					</form>
				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


