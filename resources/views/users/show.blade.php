@extends('layouts.global')

@section('title') Detail Category @endsection 

@section('content')
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <label><b>Category name</b></label><br>
        {{$category->name}}
        <br><br>

        <label><b>Category slug</b></label><br>
        {{$category->slug}}
        <br><br>

        <label><b>Category image</b></label><br>
        @if($category->image)
          <img src="{{asset('storage/' . $category->image)}}" width="120px">
        @endif
      </div>
    </div>
  </div>
@endsection
<div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <b>Name:</b> <br/>
        {{$user->name}}
        <br><br>

        @if($user->avatar)
          <img src="{{asset('storage/'. $user->avatar)}}" width="128px"/>
        @else 
          No avatar
        @endif 

        <br>
        <br>
        <b>Username:</b><br>
        {{$user->email}}

        <br>
        <br>
        <b>Phone number</b> <br>
        {{$user->phone}}

        <br><br>
        <b>Address</b> <br>
        {{$user->address}}

        <br>
        <br>
        <b>Roles:</b> <br>
        @foreach (json_decode($user->roles) as $role)
            &middot; {{$role}} <br>
        @endforeach
      </div>
    </div>
  </div>