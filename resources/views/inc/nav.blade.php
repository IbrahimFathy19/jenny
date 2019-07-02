
  <!-- Navbar -->
  <nav class="navbar sticky-top navbar-expand-md navbar-light navbar-laravel site-header" id="mainNav">
    <div class="container-fluid" id="myNavbar">
      <a class="py-2 mr-2" href="{{ url('/') }}">
        <svg  width="24" height="24" fill="none" stroke="blue" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>{{ config('app.name', 'Laravel') }}</title><circle cx="58" cy="1128" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
      </a>
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#tour">Tour</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
          </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
              </li>
            @endif
            @else
              <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('assistant-settings') }}"
                        >
                        {{ __('Settings') }}
                    </a>

                    <a class="dropdown-item" href=""
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <img class="user_profile_pic_small" src={{App\UserProfile::find(Auth::user()->user_profile_id)->profile_photo_path}} height="24" width="24">

                      <!--user name-->
                      {{App\UserProfile::find(Auth::user()->user_profile_id)->first_name}} <span class="caret"></span>

                  </a>
              </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
