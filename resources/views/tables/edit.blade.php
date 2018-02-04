@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    <hr>
    <form action="{{url('admin/locations', [$location->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Location Name</label>
            <input type="text" value="{{$location->name}}" class="form-control" id="locationName" name="name">
        </div>
        <div class="form-group">
            <label for="description">Location Description</label>
            <input type="text" value="{{$location->description}}" class="form-control" id="locationDescription"
                   name="description">
        </div>

        <div class="form-group">
            <label for="address">Location Address</label>
            <input type="text" value="{{$location->address}}" class="form-control" id="locationAddress" name="address">
        </div>

        <div class="form-group">
            <label for="capacity">Location Capacity</label>
            <input type="number" value="{{$location->capacity}}" class="form-control" id="locationCapacity"
                   name="capacity">
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

    <a href="{{ URL::to('/admin/locations/' . $location->id . '/events/create') }}">
        <button type="button" class="btn btn-primary"> Create Event</button>
    </a>

@endsection
