@extends('layouts.app')
<link href="{{ asset('css/cards-horizontal.css') }}" rel="stylesheet">
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="container">
        <ul class="event-list">
            <br>
            @if($events != "")
                @foreach($events as $event)
                    <li>
                        <time>
                            <span class="day" style="margin-top: 15px"><i class="fa fa-calendar"></i> </span>
                        </time>
                        <div class="info" style="padding-left: 20px">
                            <h3 style="color: #445e83">{{$event->event-> name}}</h3>
                            @if($event->event->from=="Expired" && $event->event->to=="Expired")
                                <p class="reservation-desc">До: {{$event->event->from}} | До: {{$event->event->to }} |
                                    Цена: {{$event->event->price }}</p>
                            @elseif($event->event->from=="Expired")
                                <p class="reservation-desc">До: {{$event->event->from}} |
                                    До: {{ Carbon\Carbon::parse($event->event->to)->format('d M Y - H:i') }} |
                                    Цена: {{$event->event->price }}</p>
                            @elseif($event->event->to=="Expired")
                                <p class="reservation-desc">
                                    До: {{ Carbon\Carbon::parse($event->event->from)->format('d M Y - H:i') }} |
                                    До: {{ $event->event->to }} | Цена: {{$event->event->price }}</p>
                            @else
                                <p class="reservation-desc">
                                    Од: {{ Carbon\Carbon::parse($event->event->from)->format('d M Y - H:i') }} |
                                    До: {{ Carbon\Carbon::parse($event->event->to)->format('d M Y - H:i') }} |
                                    Цена: {{$event->event->price }}</p>
                            @endif
                        </div>
                        <div class="social">
                            <ul>
                                <h3 style="color: #445e83">Маса број:</h3>
                                <h2 style="color: #445e83"><b>{{$event->id}}</b></h2>
                            </ul>
                        </div>
                    </li>
                @endforeach
            @else
                <tr>
                    <td> Нема резервации</td>
                </tr>
            @endif
        </ul>
    </div>
@endsection

