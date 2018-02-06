@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">
    <div class="container px-1 mx-6 mb-0">
        {{--<h1>Showing Location {{ $location->name }}</h1>--}}
        <br>

        <div class="jumbotron jumbotron-fluid mb-0" style="
                background-repeat: no-repeat;
                background-image: url({{asset('assets/img/home-image1.svg')}});
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
            <div class="container">
                <h1 class="display-3 text-light" >Локал Хост</h1> <br>
                <a class="btn btn-danger mr-3" href="{{ route('register') }}">РЕЗЕРВИРАЈ</a>
                <a class="btn btn-warning ml-3" href="{{ route('register-admin')}}">БИДИ ХОСТ</a>
                <br><br>
                <p class="lead" style="color: #D0D2F9">Резервирајте на вашето омилено место или бидете хост на настани</p>

     
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
