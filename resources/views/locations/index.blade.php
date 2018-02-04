@extends('layouts.app')
@if (Auth::guard('admin')->check())
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    {{-- <table class="table">
         <thead class="thead-dark">
         <tr>
             <th scope="col">#</th>
             <th scope="col">Location Title</th>
             <th scope="col">Location Description</th>
             <th scope="col">Address</th>
             <th scope="col">Capacity</th>
             <th scope="col">Action</th>
         </tr>
         </thead>
         <tbody>
         @foreach($locations as $location)
             <tr>
                 <th scope="row">{{$location->id}}</th>
                 <td><a href="locations/{{$location->id}}">{{$location->name}}</a></td>
                 <td>{{$location->description}}</td>
                 <td>{{$location->address }}</td>
                 <td>{{$location->capacity }}</td>

                 <td>
                     <div class="btn-group" role="group" aria-label="Basic example">
                         <a href="{{ URL::to('/admin/locations/' . $location->id . '/edit') }}">
                             <button type="button" class="btn btn-warning">Edit</button>
                         </a>&nbsp;
                         <form action="{{url('/admin/locations', [$location->id])}}" method="POST">
                             <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <input type="submit" class="btn btn-danger" value="Delete"/>
                         </form>
                     </div>
                 </td>
             </tr>
         @endforeach
         </tbody>
     </table>--}}
    @foreach($locations as $location)
        <div class="card text-xs-center">
            <div class="card-header">
                IMAGE
            </div>
            <div class="card-block">
                <h4 class="card-title">{{$location->name}}</h4>
                <p class="card-text">{{$location->address }}</p>
                <p class="card-text">{{$location->description }}</p>
                <a href="locations/{{$location->id}}" class="btn btn-primary">Види локал</a>
            </div>
            <div class="card-footer text-muted">

            </div>
        </div>
    @endforeach
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
            <th scope="col">Location Title</th>
            <th scope="col">Location Description</th>
            <th scope="col">Address</th>
            <th scope="col">Capacity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locations as $location)
            <tr>
                <th scope="row">{{$location->id}}</th>
                <td><a href="locations/{{$location->id}}">{{$location->name}}</a></td>
                <td>{{$location->description}}</td>
                <td>{{$location->address }}</td>
                <td>{{$location->capacity }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@endif
