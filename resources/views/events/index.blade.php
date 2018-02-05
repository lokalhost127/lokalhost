@extends('layouts.app')
<link href="{{ asset('css/cards-horizontal.css') }}" rel="stylesheet">
<link href="{{ asset('css/cards.css') }}" rel="stylesheet">
@if (Auth::guard('admin')->check())

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @if( $location->id!="")
        <div>
            <a class="add-local" href="{{ URL::to('/admin/locations/' . $location->id . '/events/create') }}"
               title="Креирај нов локал"><i class="fa fa-plus-circle"></i></a>
        </div>
    @endif
    <div class="container">
        <ul class="event-list">
            <br>
            @foreach($events as $event)
                @if($event->from=="Expired")
                @else
                <li>
                    <time>
                        <span class="day">{{ Carbon\Carbon::parse($event->from)->format('d') }}</span>
                        <span class="month">{{ Carbon\Carbon::parse($event->from)->format('M') }}</span>
                        <span class="year">2014</span>
                        <span class="time">ALL DAY</span>
                    </time>
                    <div class="info">
                        <a href="{{ URL::to('/admin/locations/' . $event->location_id . '/events/'. $event->id ) }}">
                            <h3 class="title">{{$event->name}}</h3>
                        </a>
                        <p class="desc">Локација: <b>{{$event->location->name}}</b> | Време:
                            <b>{{ Carbon\Carbon::parse($event->from)->format('H:i') }}</b></p>
                        <p class="desc">Цена за влез: <b>{{$event->price}} денари</b></p>
                    </div>

                    <div class="social">
                        <ul>
                            @if( $location->id!="")
                                <a href="{{ URL::to('/admin/locations/' . $location->id . '/events/'. $event->id . '/edit') }}">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-edit fa-2x"
                                                                                     style="color: white"></i></button>
                                </a>
                                <form action="{{url('/admin/locations/' . $location->id . '/events', [$event->id])}}"
                                      method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash fa-2x"
                                                                                    style="color: white"></i></button>
                                </form>
                            @else
                                <a href="{{ URL::to('/events/'. $event->id . '/edit') }}">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-edit fa-2x"
                                                                                     style="color: white"></i></button>
                                </a>
                                <form action="{{url('/events', [$event->id])}}"
                                      method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash fa-2x"
                                                                                    style="color: white"></i></button>
                                </form>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
            @endforeach
        </ul>
    </div>

@endsection

@else

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="container">
        <ul class="event-list">
            <br>
            @foreach($events as $event)

                <li>
                    <time>
                        <span class="day">{{ Carbon\Carbon::parse($event->from)->format('d') }}</span>
                        <span class="month">{{ Carbon\Carbon::parse($event->from)->format('M') }}</span>
                        <span class="year">2014</span>
                        <span class="time">ALL DAY</span>
                    </time>
                    <div class="info">
                        <a href="{{ URL::to('/locations/' . $event->location_id . '/events/'. $event->id ) }}">
                            <h3 class="title">{{$event->name}}</h3>
                        </a>
                        <p class="desc">Локација: <b>{{$event->location->name}}</b> | Време:
                            <b>{{ Carbon\Carbon::parse($event->from)->format('H:i') }}</b></p>
                        <p class="desc">Цена за влез: <b>{{$event->price}} денари</b></p>
                    </div>
                    <div class="social">
                        <ul>
                            @if($event-> to < $date)
                                <a href="events/{{$event->id}}/tables">
                                    <button type="button" disabled class="btn btn-primary"
                                            style="margin-top: 35px; margin-bottom: 25px"> Изминат
                                    </button>
                                </a>
                            @else
                                <a href="events/{{$event->id}}/tables">
                                    <button type="button" class="btn btn-primary"
                                            style="margin-top: 35px; margin-bottom: 25px"> Резервирај
                                    </button>
                                </a>
                            @endif
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
@endif