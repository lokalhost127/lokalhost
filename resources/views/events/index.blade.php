@extends('layouts.app')

@if (Auth::guard('admin')->check())

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
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td> {{$event-> name}}</td>
                <td>{{$event->from}}</td>
                <td>{{$event->to }}</td>
                <td>{{$event->price }}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">

                        @if($location->id!="")
                        <a  href="{{ URL::to('/admin/locations/' . $location->id . '/events/'. $event->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        @else
                            <a  href="{{ URL::to('/events/'. $event->id . '/edit') }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                        @endif

                        <form action="{{url('/admin/locations/' . $location->id . '/events', [$event->id])}}"
                              method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@else

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
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td> {{$event-> name}}</td>
                <td>{{$event->from}}</td>
                <td>{{$event->to }}</td>
                <td>{{$event->price }}</td>
                <td>
                    <a href="events/{{$event->id}}/tables">
                        <button type="button" class="btn btn-primary"> Reserve </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@endif


