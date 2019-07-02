
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
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>

        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 menu">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 menu">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 menu">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">Another headline</h2>
            <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
</div>



@endsection