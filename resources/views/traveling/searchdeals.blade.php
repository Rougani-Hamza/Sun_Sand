@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Searching Results</h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <form id="search-form" name="gs" method="POST" role="search" action="{{ route ('traveling.deals.search')}}">
                @csrf
                <div class="row">
                  <div class="col-lg-2">
                    <h4>Sort Deals By:</h4>
                  </div>
                  <div class="col-lg-4">
                      <fieldset>
                          <select name="cities_id" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                              <option selected>Destinations</option>
                              @foreach ($cities as $city)
                              <option value="{{$city->id}}">{{$city->name}}</option>
                              @endforeach
                          </select>
                      </fieldset>
                  </div>
                  <div class="col-lg-4">
                      <fieldset>
                          <select name="price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                              <option selected>Price</option>
                              <option value="100">100 MAD</option>
                              <option value="250">250 MAD</option>
                              <option value="500">500 MAD</option>
                              <option value="1000">1,000 MAD</option>
                          </select>
                      </fieldset>
                  </div>
                  <div class="col-lg-2">                        
                      <fieldset>
                          <button type="submit" class="border-button">Search Results</button>
                      </fieldset>
                  </div>
                </div>
              </form>
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
            <p>You Can Grab Amazing Deals!</p>
          </div>
        </div>
        @if(count($searches) > 0)
        @foreach ($searches as $spot)
        <div class="col-lg-6 col-sm-6">
            <div class="item">
              <div class="row">
                <div class="col-lg-6">
                  <div class="image">
                    <img src="{{asset ('assets/images/'.$spot->image.'')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6 align-self-center">
                  <div class="content">
                    <span class="info">*Limited Offer Today</span>
                    <h4>{{$spot->name}}</h4>
                    <div class="row">
                      <div class="col-6">
                        <i class="fa fa-clock"></i>
                        <span class="list">Enjoy Ur Days</span>
                      </div>
                      <div class="col-6">
                        <i class="fa fa-map"></i>
                        <span class="list">Daily Places</span>
                      </div>
                    </div>
                    <p>Discover an Amazing Area</p>
                    <div class="main-button">
                      <a href="{{route ('traveling.reservation', $spot->id)}}">Make a Reservation</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        @endforeach
        @else 
        <p class="alert alert-success"> we dont have any deals like this for now </p>
        @endif
      </div>
    </div>
  </div>
@endsection