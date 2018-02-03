@extends('layouts.app')

@section('content')
    <h1>Showing Event {{ $event->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Event Name:</strong> {{ $event->name }}<br>
            <strong>From:</strong> {{ $event->from }}<br>
            <strong>To:</strong> {{ $event-> to }} <br>
            <strong>Price:</strong> {{ $event-> price }} <br>

        </p>
    </div>
@endsection