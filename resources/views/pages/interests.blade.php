
@extends('layouts.app')

@section('title')
  <title>{{App\UserProfile::findOrFail(Auth::user()->user_profile_id)->first_name}}</title>
@endsection


@section('content')

    {{-- start code here :D --}}

@endsection