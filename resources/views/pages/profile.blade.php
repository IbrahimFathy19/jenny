
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
        <div class="panel-group" role="tablist"> 
            <div class="panel panel-default"> 
                <div class="panel-heading" role="tab" id="collapseListGroupHeading1"> 
                    <h4 class="panel-title"> 
                        <a href="#collapseListGroup1" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup1"> Interests </a> </h4> 
                </div> 
                <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup1" aria-labelledby="collapseListGroupHeading1" aria-expanded="false" style="height: 0px;"> 
                    <ul class="list-group"> 
                        <li class="list-group-item">Music</li> 
                        <li class="list-group-item">Foods</li> 
                        <li class="list-group-item">Sports</li> </ul> 
                        <div class="list-group-item">Places</div>
                </div> 
            </div> 
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card text-center p-3 mb-2 text-dark" style="width: 18rem;background:navajowhite">
      <img class="card-img-top" src="images\app\sessions2.jpg" alt="sessions">
      <div class="card-body">
        <p class="card-text">Happy times come and go, but the memories stay forever</p>
        <a href="{{ route('sessions') }}" class="btn btn-light btn-lg">sessions</a>
      </div>
    </div>
  </div>
</div>


@endsection