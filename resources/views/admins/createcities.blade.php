@extends('layouts.admin')


@section ('content')


<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Add New City</h5>
             <form method="POST" action="{{ route('create.cities') }}" enctype="multipart/form-data">
            <!-- Email input -->
            @csrf
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
            </div>
            @if($errors->has('name'))
                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
            
             
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="population" id="form2Example1" class="form-control" placeholder="population" />
             
            </div> 
            @if($errors->has('population'))
                <p class="alert alert-danger">{{ $errors->first('population') }}</p>
            @endif

             <div class="form-outline mb-4 mt-4">
              <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="territory" />
            
            </div> 
            @if($errors->has('territory'))
            <p class="alert alert-danger">{{ $errors->first('territory') }}</p>
        @endif
             
            
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="avg_rent_price" id="form2Example1" class="form-control" placeholder="avg_rent_price" />
             
            </div> 

            @if($errors->has('avg_rent_price'))
            <p class="alert alert-danger">{{ $errors->first('avg_rent_price') }}</p>
        @endif

            <div class="form-floating">
              <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            @if($errors->has('description'))
            <p class="alert alert-danger">{{ $errors->first('description') }}</p>
        @endif

            <div class="form-outline mb-4 mt-4">
                <input type="file" name="image" id="form2Example1" class="form-control" />
                @if($errors->has('image'))
                <p class="alert alert-danger">{{ $errors->first('image') }}</p>
            @endif  

            <div class="form-outline mb-4 mt-4">
                    <textarea name="region" class="form-control" placeholder="region" id="form2Example1"></textarea>
                  </div>
                  @if($errors->has('region'))
                  <p class="alert alert-danger">{{ $errors->first('region') }}</p>
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