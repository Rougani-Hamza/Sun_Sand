@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Edit Spot
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('update.spots', $spot->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $spot->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{ $spot->category }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price (DH):</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $spot->price }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <small class="form-text text-muted">Current image: {{ $spot->image }}</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Spot</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
