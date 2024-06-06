@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit City</h2>
    <form method="POST" action="{{ route('update.cities', $city->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $city->name }}" required>
        </div>
        <div class="form-group">
            <label for="population">Population:</label>
            <input type="number" class="form-control" name="population" value="{{ $city->population }}" required>
        </div>
        <div class="form-group">
            <label for="territory">Territory:</label>
            <input type="text" class="form-control" name="territory" value="{{ $city->territory }}" required>
        </div>
        <div class="form-group">
            <label for="avg_rent_price">Average Renting Price:</label>
            <input type="text" class="form-control" name="avg_rent_price" value="{{ $city->avg_rent_price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update City</button>
    </form>
</div>
@endsection
