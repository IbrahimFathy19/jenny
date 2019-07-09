
@extends('layouts.app')

@section('title')
  <title>{{App\UserProfile::findOrFail(Auth::user()->user_profile_id)->first_name}}</title>
@endsection


@section('content')

    {{-- start code here :D --}}
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="profile">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">interests</li>
  </ol>
</nav>

<div class="row">
  <div class="col-sm-7">
    <div class="card text-center p-3 mb-2 text-dark" style="width: 18rem;background:navajowhite">
      <div class="card-body">
        <p class="card-title">Food</p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Food
        </a>
      </div>
    </div>
  </div>
  
 <div class="col">
    <div class="card text-center p-3 mb-2 text-dark" style="width: 18rem;background:navajowhite">
      <div class="card-body">
        <p class="card-title">Sports</p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Sports
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-7">
    <div class="card text-center p-3 mb-2 text-dark" style="width: 18rem;background:navajowhite">
      <div class="card-body">
        <p class="card-title">Music</p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
           Food
        </a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-center p-3 mb-2 text-dark" style="width: 18rem;background:navajowhite">
      <div class="card-body">
        <p class="card-title">Places</p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Food
        </a>
      </div>
    </div>
  </div>
</div>

<div class="collapse" id="collapseExample">
  <div class="card card-body">
    test.
  </div>
</div>

@endsection