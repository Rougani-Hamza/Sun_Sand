@extends('layouts.admin')

@section('content')

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
          <a href="{{ route('create.spots') }}" class="btn btn-primary mb-4 text-center float-right">Create New Spot</a>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($spots as $spot)
                <tr>
                    <th scope="row">{{ $spot->id }}</th>
                    <td>{{ $spot->name }}</td>
                    <td><img width="64" height="64" src="{{ asset('assets/images/'.$spot->image) }}"></td>
                    <td>{{ $spot->category }}</td>
                    <td>{{ $spot->price }} DH</td>
                    <td><a href="{{ route('edit.spots', $spot->id) }}" class="btn btn-success text-center">Edit</a></td>
                    <td><a href="{{ route('delete.spots', $spot->id) }}" class="btn btn-danger text-center">Delete</a></td>
                  </tr>
                @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

@endsection
