@extends('layouts.app')

@section('content')
<div class="about-main-content" style="margin-top:-25px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <div class="blur-bg"></div>
            <h4>EXPLORE OUR REGION</h4>
            <div class="line-dec"></div>
            <h2>Welcome To Souss Massa</h2>
            <p></p>
            <div class="main-button">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="cities-town">
    <div class="container">
      <div class="row">
        <div class="slider-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>{{ $cities->name }}’s <em>Spots &amp; Towns</em></h2>
            </div>
            <div class="col-lg-12">
              <div class="owl-cites-town owl-carousel">
                @foreach ($spots as $spot)
                <div class="item">
                  <div class="thumb">
                    <img src="{{ asset('assets/images/'.$spot->image.'')}}" alt="">
                    <h4 style="font-weight:700; text-shadow: 1px 1px 2px Gray;">{{ $spot->name }}</h4>
                  </div>
                </div>
                @endforeach
                {{-- <div class="item">
                  <div class="thumb">
                    <img src="assets/images/cities-02.jpg" alt="">
                    <h4>Taghazout</h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/cities-03.jpg" alt="">
                    <h4>Imi Ouaddar</h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/cities-04.jpg" alt="">
                    <h4>Sidi Ifni</h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/cities-01.jpg" alt="">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/cities-02.jpg" alt="">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/cities-03.jpg" alt="">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/cities-04.jpg" alt="">
                    <h4></h4>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="weekly-offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each Spot</h2>
            <p>We Commit our self to provide best offers with nice price.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">
            @foreach ($spots as $spot)
            <div class="item">
              <div class="thumb">
                <img src="{{ asset('assets/images/'.$spot->image.'')}}" alt="">
                <div class="text">
                  <h4>{{ $spot->name }}<br><span></span></h4>
                  <h6>MAD{{ $spot->price }}<br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  <ul>
                    <li>Deal Includes:</li>
                    <li><i class="fa fa-taxi"></i> Days Trip > Hotel Included</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                  </ul>
                  <div class="main-button">
                    <a href="{{route ('traveling.reservation', $spot->id)}}">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            {{-- <div class="item">
              <div class="thumb">
                <img src="assets/images/offers-02.jpg" alt="">
                <div class="text">
                  <h4>Kingston<br><span><i class="fa fa-users"></i> 234 Check Ins</span></h4>
                  <h6>$420<br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  <ul>
                    <li>Deal Includes:</li>
                    <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                  </ul>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/offers-03.jpg" alt="">
                <div class="text">
                  <h4>George Town<br><span><i class="fa fa-users"></i> 234 Check Ins</span></h4>
                  <h6>$420<br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  <ul>
                    <li>Deal Includes:</li>
                    <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                  </ul>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/offers-01.jpg" alt="">
                <div class="text">
                  <h4>Havana<br><span><i class="fa fa-users"></i> 234 Check Ins</span></h4>
                  <h6>$420<br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  <ul>
                    <li>Deal Includes:</li>
                    <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                  </ul>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/offers-02.jpg" alt="">
                <div class="text">
                  <h4>Kingston<br><span><i class="fa fa-users"></i> 234 Check Ins</span></h4>
                  <h6>$420<br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  <ul>
                    <li>Deal Includes:</li>
                    <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                  </ul>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/offers-03.jpg" alt="">
                <div class="text">
                  <h4>George Town<br><span><i class="fa fa-users"></i> 234 Check Ins</span></h4>
                  <h6>$420<br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  <ul>
                    <li>Deal Includes:</li>
                    <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                  </ul>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="{{ asset('assets/images/Souss.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Discover More About Our Region</h2>
            <p>Souss it's Rich Region Full Of Beautiful Spots.</p>
          </div>
          <div class="row">
           
            <div class="col-lg-12">
              <div class="info-item">
                <div class="row">
                  <div class="col-lg-6">
                    <h4>12.560+</h4>
                    <span>Amazing Places</span>
                  </div>
                  <div class="col-lg-6">
                    <h4>240.580+</h4>
                    <span>Different Check-ins Yearly</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p>We Always try to provide New Deals</p>
          
        </div>
      </div>
    </div>
  </div>



@endsection