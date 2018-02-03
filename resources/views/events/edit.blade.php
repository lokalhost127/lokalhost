@extends('layouts.app')

@section('content')
    <h1>Edit Event</h1>
    <hr>
    <form action="{{url('admin/locations/' . $location->id . '/events', [$event->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" value="{{$event->name}}" class="form-control" id="locationName" name="name">
        </div>

        <div class="form-group">
            <label for="from"> From </label>
            <input type="datetime-local" value="{{$event->from}}" class="form-control" id="from" name="from">
        </div>

        <div class="form-group">
            <label for="to">To</label>
            <input type="datetime-local" value="{{$event->to}}" class="form-control" id="to" name="to">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" value="{{$event->price}}" class="form-control" id="price" name="price">
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
