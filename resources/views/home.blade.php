@extends('layouts.app')

@section('content')
<section id="section-1">
    <div class="content-slider">
      
      @foreach($cities as $key => $city)
        <input type="radio" id="banner{{  $key +1 }}" class="sec-1-input" name="banner" checked>
      @endforeach
      <div class="slider">
        @foreach($cities as $key => $city)
        <div id="top-banner-{{$key+1}}" class="banner" class="progressbar-fill" class="progressbar" style="background-image: url('{{ asset('assets/images/'.$city->image.'')}}')">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Discover Various Beautiful Spots Of:</h2>
              <h1>{{ $city->name }}</h1>
              <div class="border-button"><a href="{{ route('traveling.about',$city->id ) }}">Go There</a></div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br>{{ $city->population }} K</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>Territory:</span><br>{{ $city->territory }} KM²<em></em></h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-home"></i>
                        <h4><span>AVG Rent Price:</span><br>{{ $city->avg_rent_price }}MAD</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="{{ route('traveling.about',$city->id ) }}">Explore More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <nav>
        <div class="controls">
          @foreach($cities as $key => $city)
          <label for="banner{{$key+1}}"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">{{ $key+1 }}</span></label>
          @endforeach
        </div>
      </nav>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="visit-country">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Visit One Of Our Beautiful Spots</h2>
            <p>Discover Beauty And Magic Of Souss Region.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="items">
            <div class="row">
              @foreach ($cities as $city )
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="{{ asset('assets/images/'.$city->image.'')}}" alt="" style="width:201px;height:205px">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>{{ $city->name }}</h4>
                        <span>{{ $city ->region }}</span>
                        <div class="main-button">
                          <a href="{{ route('traveling.about',$city->id ) }}">Explore More</a>
                        </div>
                        <p>{{ $city->description }}</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> {{ $city->population }} K People</li>
                          <li><i class="fa fa-globe"></i> {{ $city->territory }} KM²</li>
                          <li><i class="fa fa-home"></i>{{ $city->avg_rent_price }}MAD</li>
                        </ul>
                        <div class="text-button">
                          <a href="{{ route('traveling.about',$city->id ) }}">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach  
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6872.253827984125!2d-9.716224387257855!3d30.545718148277306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb24d4538db0173%3A0x3d5bf22fe7d11aca!2sTaghazout!5e0!3m2!1sen!2sma!4v1711970668308!5m2!1sen!2sma" width="100%" height="550px" frameborder="0" style="border:0; border-radius: 23px; " allowfullscreen=""></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
