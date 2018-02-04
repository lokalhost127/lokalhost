@extends('layouts.app')
@section('content')
    <h1>Add New Location</h1>
    <hr>
    <form action="/admin/locations" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Location Name</label>
            <input type="text" class="form-control" id="locationName"  name="name">
        </div>
        <div class="form-group">
            <label for="description">Location Description</label>
            <input type="text" class="form-control" id="locationDescription" name="description">
        </div>

        <div class="form-group">
            <label for="address">Location Address</label>
            <input type="text" class="form-control" id="locationAddress" name="address">
        </div>

        <div class="form-group">
            <label for="capacity">Location Capacity</label>
            <input type="number" class="form-control" id="locationCapacity" name="capacity">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
