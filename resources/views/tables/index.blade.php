@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Reserved</th>
            <th scope="col">User</th>
            <th scope="col">Event</th>
            <th scope="col">Reserve</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tables as $table)
            <tr>
                <th scope="row">{{$table->id}}</th>
                <td>{{$table->reserved}}</td>
                <td>{{$table-> user_id }}</td>
                <td>{{$table-> event_id }}</td>
                <th>
                    @if (Auth::user()=="")
                        @if($table->reserved == true)
                            <input type="submit" disabled class="btn btn-danger" value="Reserve"/>
                        @else
                            <a href="/login">
                                <input type="submit" class="btn btn-danger" value="Reserve"/>
                            </a>
                        @endif
                    @else
                        <form action="{{url('locations/' . $event->location_id . '/events/' . $event->id . '/tables' , [$table->id])}}"
                              method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if($table->reserved == true)
                                <input type="submit" disabled class="btn btn-danger" value="Reserve"/>
                            @else
                                <input type="submit" class="btn btn-danger" value="Reserve"/>
                            @endif
                        </form>
                    @endif
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

