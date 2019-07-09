
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
    <div class="card-columns">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">History</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
@endsection