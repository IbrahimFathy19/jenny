
@extends('layouts.app')

@section('title')
  <title>{{App\UserProfile::findOrFail(Auth::user()->user_profile_id)->first_name}}</title>
@endsection


@section('content')
<div class="row">
  <div class="col-sm-7">
    <div class="card text-center p-3 mb-2 text-dark" style="width: 18rem;background:navajowhite">
      <img class="card-img-top" src="images\app\interests2.jpg" alt="interests">
      <div class="card-body">
        <p class="card-text">your interests that provide deep insight into your psyche</p>
        <a href="#" class="btn btn-light btn-lg">interests</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card text-center p-3 mb-2 text-dark" style="width: 18rem;background:navajowhite">
      <img class="card-img-top" src="images\app\sessions2.jpg" alt="sessions">
      <div class="card-body">
        <p class="card-text">Happy times come and go, but the memories stay forever</p>
        <a href="#" class="btn btn-light btn-lg">sessions</a>
      </div>
    </div>
  </div>
</div>


@endsection