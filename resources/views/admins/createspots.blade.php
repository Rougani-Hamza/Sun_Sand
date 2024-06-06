@extends('layouts.admin')


@section ('content')


<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create New Spot</h5>
      <form method="POST" action="{{ route('store.spots') }}" enctype="multipart/form-data">
            <!-- Email input -->
            @csrf
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
             
            </div>
            @if($errors->has('name'))
            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
        @endif
            <div class="form-outline mb-4 mt-4">
              <input type="file" name="image" id="form2Example1" class="form-control"  />
             
            </div>
            @if($errors->has('image'))
            <p class="alert alert-danger">{{ $errors->first('image') }}</p>
        @endif
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
             
            </div>
            @if($errors->has('price'))
            <p class="alert alert-danger">{{ $errors->first('price') }}</p>
        @endif
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="category" id="form2Example1" class="form-control" placeholder="category" />
             
            </div>
            @if($errors->has('category'))
            <p class="alert alert-danger">{{ $errors->first('category') }}</p>
        @endif
            <div class="form-outline mb-4 mt-4">

              <select name="city_id" class="form-select  form-control" aria-label="Default select example">
                <option selected>Choose City</option>
                @foreach ($cities as $city )
                <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
              </select>
            </div>
            @if($errors->has('city_id'))
            <p class="alert alert-danger">{{ $errors->first('city_id') }}</p>
        @endif

            <br>
          

  
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

      
          </form>

        </div>
      </div>
    </div>
  </div>
  @endsection