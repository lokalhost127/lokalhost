@extends('layouts.app')

@section('content')
    <h1>Showing Location {{ $location->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Location Name:</strong> {{ $location->name }}<br>
            <strong>Location Address:</strong> {{ $location->address }}<br>
            <strong>Description:</strong> {{ $location->description }} <br>
            <strong>Capacity:</strong> {{ $location->capacity }} <br>

        </p>
    </div>
@endsection