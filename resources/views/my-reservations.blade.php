@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Event Name</th>
            <th scope="col"> From</th>
            <th scope="col"> To</th>
            <th scope="col">Price</th>
            <th scope="col">Table Number</th>

        </tr>
        </thead>
        <tbody>
        @if($events == "")
            @foreach($events as $event)
                <tr>
                    <th scope="row">{{$event->event->id}}</th>
                    <td> {{$event->event-> name}}</td>
                    <td>{{$event->event->from}}</td>
                    <td>{{$event->event->to }}</td>
                    <td>{{$event->event->price }}</td>
                    <td>{{$event->id }}</td>
                </tr>
            @endforeach
        @else
            <tr> <td>  Нема резервации </td></tr>
        @endif
        </tbody>
    </table>
@endsection

