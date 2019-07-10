
@extends('layouts.app')

@section('title')
  <title>{{config('app.name', 'Smart Assistant For Hotel Guests')}}</title>
@endsection


@section('content')
  <div class="overflow-hidden text-center bg-light d-flex align-items-center justify-content-center" id="mainMenu">
    <div class="row py-5">
      <div class="col-lg-8 col-md-7 col-sm-6 col-xs-5 mx-auto my-auto text-white d-flex justify-content-center">
        <div class="w-75">
            <!--<div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>-->
            <h1 class="display-4 font-weight-normal text-uppercase font-weight-bold">{{config('app.name', 'Smart Assistant For Hotel Guests')}}</h1>
            <p class="lead font-weight-bold text">Live comfortable. Live free.</p>
            <p class="lead font-weight-normal">Before we work on artificial intelligence why don’t we do something about natural stupidity?
            </p>
        </div>
      </div>
  
      @guest
      <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mx-auto my-auto d-flex justify-content-center text-white">
          <div class="main-login-form px-3 py-3 border-secondary rounded">
            <form action="{{ route('login') }}"  method="post">
              
              <div class="mb-2">
                <a href="{{ url('/login/facebook') }}" class="btn btn-primary btn-block btn-lg"><i class="fab fa-facebook"></i> Sign in with <b>Facebook</b></a>
                <!--<a href="#" class="btn btn-info btn-block btn-lg"><i class="fab fa-twitter"></i> Sign in with <b>Twitter</b></a>-->
                <a href="{{ url('/login/google') }}" class="btn btn-danger btn-block btn-lg"><i class="fab fa-google"></i> Sign in with <b>Google</b></a>
              </div>
              <div><i>or</i></div>
              @csrf

              <div class="form-group">
                <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
                </div>
              </div>

              <div class="form-group text-center small">
                <button type="submit" class="btn btn-success btn-lg btn-block login-btn">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </div>

                <p class="text-center large">Don't have an account yet?</p>
                <a href="/register" class="btn btn-primary">Sign Up</a>
            </form>
          
        </div>
      </div>
      @endguest
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 menu">
    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">Welcome message</h2>
            <p class="lead">When the receptionist end the guest's check-in, when the guest say "hey, Jenny" the assistant welcomes him</p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 250px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\welcome.png">
        </div>
    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Tell me a joke</h2>
            <p class="lead">"Retrieve random joke from local database
                This local database will be updated every 20 mins with new jokes"</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 70%; height: 210px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\joke.jpg">
        </div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 menu">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Morning text</h2>
            <p class="lead">The mornig text sections provide 
              news and/or delete any section ther guest didn't need it as morning text</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 250px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\morning.jpg">
        </div>
    </div>
    <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">Estimate trip time | provide location </h2>
            <p class="lead">The smart assistant will send the location to our mob app and tell to the guest the time estimation for this trip</p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 250px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\estimate.jpg">
        </div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 menu">
    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Hotel sounds playlist</h2>
            <p class="lead">The smart assistant will get the names of those sounds from hotel database then get the sounds 
              of those names from such music provider and play some tracks of them</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 210px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\music.jpg">
        </div>
    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">IOT controlling</h2>
            <p class="lead">IOT server will received a specific command to control an IOT device 
              but the guest could provide this command over voice to smart assistant hardware</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 240px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\IOT.jpg">
        </div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 menu">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Emergency call </h2>
            <p class="lead">The smart assistant will handle the emergency case by showing note. 
              On desktop interface for hotel reception</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 200px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\emergency.jpg">
        </div>
    </div>
    <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">Alarms</h2>
            <p class="lead">The smart assistant will ring an alarm at this certain time by
               playing an song from guest's choices</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 200px; border-radius: 21px 21px 0 0;">
            <img class="img" src="images\app\alarm.jpg">
        </div>
    </div>
</div>



@endsection