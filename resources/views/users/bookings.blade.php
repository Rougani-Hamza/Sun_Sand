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
            <h2><b>Best Weekly Offers In Each City</b></h2>
            <p>We Always Try To Provide The Best Service With Comptetive Price</p>
            <div class="alert alert-info" role="alert">
              In case of order cancellation, the refund process will take approximately <strong>3-10 business days</strong>.
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Feel Free to Contact Us</h5>
                <p class="card-text">Our Customer support team is available from 10:00 AM to 6:00 PM (weekends excluded).</p>
                <p class="card-text">You can reach us by:</p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Email:</strong> Sun_Sand@gmail.com</li>
                  <li class="list-group-item"><strong>Phone:</strong> +2126-39465647</li>
                </ul>
              </div>
            </div>
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
                <td>{{$booking->price}} DH</td>
                <td>{{$booking->status}}</td>

              </tr>

            @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection