@extends('layouts.admin')


@section ('content')


<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if(session()->has('update'))
          <div class="alert alert-success">
              {{ session()->get('update') }}
            </div>
            @endif

            @if(session()->has('delete'))
          <div class="alert alert-success">
              {{ session()->get('delete') }}
            </div>
            @endif
          <h5 class="card-title mb-4 d-inline">Bookings</h5>
        
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone_Number</th>
                <th scope="col">Num_guests</th>
                <th scope="col">Check_in_Date</th>
                <th scope="col">Destination</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking) 
                    
               
              <tr>
                <th scope="row">{{ $booking->id }}</th>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->phone_number }}</td>
                <td>{{ $booking->num_guests }}</td>
                <td>{{ $booking->checK_in_date }}</td>
                <td>{{ $booking->destination }}</td>
                <td>{{ $booking->price }} DH</td>
                <td>{{ $booking->status }}</td>
                <td><a href="{{ route('edit.booking', $booking->id) }}" class="btn btn-warning  text-center ">Change Status</a></td>
                <td><a href="{{ route ('delete.booking', $city->id) }}" class="btn btn-danger text-center" onclick="confirmDelete(event)">Delete</a></td>
              </tr>
              @endforeach


            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

@endsection