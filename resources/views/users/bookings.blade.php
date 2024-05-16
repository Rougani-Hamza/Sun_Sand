@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>My Bookings</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>We Always Try To Provide.</p>
          </div>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Number of Guests</th>
                <th scope="col">Check in Date</th>
                <th scope="col">Destination</th>
                <th scope="col">Price DH</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
            <tr>
                <th scope="row">{{$booking->id}}</th>
                <td>{{$booking->name}}</td>
                <td>{{$booking->phone_number}}</td>
                <td>{{$booking->num_guests}}</td>
                <td>{{$booking->checK_in_date}}</td>
                <td>{{$booking->destination}}</td>
                <td>{{$booking->price}}</td>
                <td>{{$booking->status}}</td>

              </tr>

            @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection