@extends('layouts.admin')


@section ('content')



<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if(session()->has('success'))
          <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif


      @if(session()->has('delete'))
      <div class="alert alert-success">
          {{ session()->get('delete') }}
        </div>
        @endif
          <h5 class="card-title mb-4 d-inline">Cities</h5>
         <a  href="{{ route('create.cities') }}" class="btn btn-primary mb-4 text-center float-right">Create New City</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">population</th>
                <th scope="col">territory</th>
                <th scope="col">Avg Renting Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($allCities as $city )
                <tr>
                    <th scope="row">{{ $city->id  }}</th>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->population }} K</td>
                    <td>{{ $city->territory }} Km²</td>
                    <td>{{ $city->avg_rent_price }} DH</td>
                    <td><a href="{{ route('edit.cities', $city->id) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ route ('delete.cities', $city->id) }}" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>   
                @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
  @endsection