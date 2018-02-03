@extends('layouts.app')
@section('content')
    <h1>Add New Event for {{$location->id}} </h1>
    <hr>
    <form action="{{url('admin/locations/'. $location->id . '/events' , [$event->id] )}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" id="locationName"  name="name">
        </div>
        <div class="form-group">
            <label for="from"> From </label>
            <input type="datetime-local" class="form-control" id="from" name="from">
        </div>

        <div class="form-group">
            <label for="to">To</label>
            <input type="datetime-local" class="form-control" id="to" name="to">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price">
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
