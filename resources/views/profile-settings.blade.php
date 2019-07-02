@extends('layouts.app')

@section('title')
  <title>{{__("Settings")}}</title>
@endsection

@section('content')
<div class="container my-5">
  <div class="row">
    
    @include('inc.settings-card')
    
    <div class="col-md-9 px-5">
      <form method="POST" action="{{ route('profile.settings.update', $user_data->id) }}">
          @csrf
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
        {{-- Personal --}}
        <div class="mb-5">
          <h3 class="h3 border-bottom border-info mb-3 pb-2">{{ __('Personal information')}}</h3>
          <fieldset class="form-group">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{__($user_data->first_name)}}" required>
              </div>
              <div class="col">
                <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{__($user_data->last_name)}}" required>
              </div>
              
              @if ($errors->has('first_name'))
              <span class="invalid-feedback" role="alert" >
                <strong>{{ $errors->first('first_name') }}</strong>
              </span>
              @endif

              @if ($errors->has('last_name'))
              <span class="invalid-feedback" role="alert" >
                <strong>{{ $errors->first('last_name') }}</strong>
              </span>
              @endif               
            </div>
          </fieldset>

          <fieldset class="form-group">
            <div class="row pt-3">
              <div class="col">
                <label class="vertical" for="profile_photo">Profile Photo</label>
              </div>
              <div class="col">
                      
                  <div class="p-image">
                    <i class="fa fa-camera upload-button"><div class="circle">
                        <!-- User Profile Image -->
                        <img class="profile-pic" src="{{__($user_data->profile_photo_path)}}">
                  
                        <!-- Default Image -->
                        <!-- <i class="fa fa-user fa-5x"></i> -->
                      </div></i>
                      <input class="file-upload" type="file" accept="image/*"/>
                </div>
              </div>
              
              {{-- @if ($errors->has('first_name'))
              <span class="invalid-feedback" role="alert" >
                <strong>{{ $errors->first('first_name') }}</strong>
              </span>
              @endif

              @if ($errors->has('last_name'))
              <span class="invalid-feedback" role="alert" >
                <strong>{{ $errors->first('last_name') }}</strong>
              </span>
              @endif                --}}
            </div>
            </fieldset>
        </div>
      </form>
    </div>
  
  @endsection