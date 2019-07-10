
@extends('layouts.app')

@section('title')
  <title>{{App\UserProfile::findOrFail(Auth::user()->user_profile_id)->first_name}}</title>
@endsection

@section('content')

    {{-- start code here :D --}}
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="profile">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">sessions</li>
      </ol>
    </nav>
 {{--   <div class="card" style="background-color:ivory">
        <div class="card-body">
          <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">hotel details</a>
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">session details</button>
              {{--<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>--}}
     {{--       </p>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                  <div class="card card-body">
                      <p>Hotel name</p>
                      <p>Description</p>
                      <p>Address</p>
                      <p>Rate</p>
                      <p>Country City</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                  <div class="card card-body">
                   <p>Room ID</p>
                   <p>Check in date</p>
                   <p>Check out date</p>
                  </div>
                </div>
              </div>
            </div>
          {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
       {{--   <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 200px;background-color:lightgreen">
            <p>Feedback</p>
            <p>Q1</p>
            <p>A1</p>
          </p>
          </div>
        </div>
      </div>
    </div>
    --}}
    <div class="card">
        <div class="row no-gutters">
            <div class="col-auto">
                <img src="images\app\hotel.jpg" class="img-fluid" alt="" style="width:100px">
            </div>
            <div class="col">
                <div class="card-block px-2">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Description</p>
                    <a href="#" class="btn btn-primary">BUTTON</a>
                </div>
            </div>
        </div>
  </div>
@endsection