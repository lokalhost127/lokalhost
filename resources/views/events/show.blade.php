@extends('layouts.app')

@section('content')
    <div class="container px-1 mx-6">
        <br>
        <div class="row">
            <div class="col-md-3 text-center pr-4 text-light" style="line-height: 1.3; font-size: 15px;">
                <i class="fa fa-arrow-circle-o-down"></i>
                <p class="h3 text-uppercase">{{ $event->name }}</p>
                <hr style="border-color: rgba(155,160,190,0.95);">
                <p class="text-justify"><strong>Локал: </strong>{{ $event->location->name }}</p>
                @if($event->from=="Expired")
                    <p class="text-left"><strong>Датум: </strong>{{$event->from}}
                @else
                    <p class="text-left">
                        <strong>Датум: </strong> {{ Carbon\Carbon::parse($event->from)->format('d M Y') }}</p>
                    <p class="text-left">
                        <strong>Час: </strong> {{ Carbon\Carbon::parse($event->from)->format('H:i') }}</p>

                @endif
                {{-- @if($event->to=="Expired")
                     <p class="text-left"><strong>Датум до: </strong>{{$event->to}}</p>
                 @else
                     <p class="text-left"><strong>Датум до: </strong> {{ Carbon\Carbon::parse($event->to)->format('d M Y') }}
                         - {{ Carbon\Carbon::parse($event->to)->format('H:i') }}</p>
                 @endif--}}
                <p class="text-left"><strong>Цена за влез:</strong> {{ $event-> price }} </p>
                <br><br><br>
                <hr style="border-color: rgba(155,160,190,0.95);">
                <div class="row">
                </div>
            </div>
            <div class="col-md-9" style="">
                <img src="{{asset('assets/img/peshtani-map.jpg')}}">
            </div>

        </div>
    </div>
@endsection