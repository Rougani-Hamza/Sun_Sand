@extends('layouts.admin')

@section ('content')
<style>
.card-link {
  text-decoration: none;
}

.card-link:hover {
  text-decoration: none;
}
</style>
<div class="row">
    <div class="col-md-4">
      <a href="{{ route('all.cities') }}" style="text-decoration:none;">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h5 class="card-title">Cities</h5>
            <p class="card-text">Number of cities: {{ $citiesCount }}</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{ route('all.spots') }}" style="text-decoration:none;">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h5 class="card-title">Spots</h5>
            <p class="card-text">Number of spots: {{ $spotsCount }}</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{ route('admins.all.admins') }}" style="text-decoration:none;">
        <div class="card bg-info text-white">
          <div class="card-body">
            <h5 class="card-title">Admins</h5>
            <p class="card-text">Number of admins: {{ $adminsCount }}</p>
          </div>
        </div>
      </a>
    </div>
  </div>
@endsection
