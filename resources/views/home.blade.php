
@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">
    <div class="container px-1 mx-6 mb-0">
        {{--<h1>Showing Location {{ $location->name }}</h1>--}}
        <br>
        <div class="jumbotron jumbotron-fluid mb-0" style="background-repeat: no-repeat; background-image: url({{asset('assets/img/backgrounds/theme.svg')}})">
            <div class="container">
                <h1 class="display-3">Lokal Host</h1>
                <a class="btn btn-danger"href="{{ route('register') }}">РЕЗЕРВИРАЈ</a>
                <a class="btn btn-warning"href="">БИДИ ХОСТ</a>
                <br>
                <p class="lead">Резервирајте на вашето омилено место или бидете хост на настани</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container-fluid">
            @foreach($locations as $location)
                <div class="card card-blue">
                    <i class="fa fa-arrow-circle-o-down"></i>
                    <p class="card-question">{{$location->name}}</p>
                    <a href="locations/{{$location->id}}" class="btn btn-outline-primary">Види локал</a>

                </div>
            @endforeach
        </div>
    </div>

@endsection
