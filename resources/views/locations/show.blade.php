@extends('layouts.app')

@section('content')
    <div class="container px-1 mx-6">
        {{--<h1>Showing Location {{ $location->name }}</h1>--}}
        <br>
        <div class="row">
            <div class="col-md-3 text-center pr-4 text-light" style="line-height: 1.3; font-size: 15px;">
                <i class="fa fa-arrow-circle-o-down"></i>
                <p class="h3 text-uppercase">{{ $location->name }}</p>
                <hr style="border-color: rgba(155,160,190,0.95);">
                <p class="text-justify" >{{ $location->description }}</p>
                <p class="text-left"><strong>Адреса:</strong> {{ $location->address }}</p>
                <p class="text-left"><strong>Капацитет:</strong> {{ $location->capacity }} </p>
                <p class="text-left"><strong>Rating:</strong> {{ $location->rating }} </p>

                <br><br><br>

                <hr style="border-color: rgba(155,160,190,0.95);">

                    <form action="/locations/{{$location->id}}/ratings" method="POST">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label>Rating
                                <input type="number" name="star" max="5" min="1">
                                @if(Auth::guard('web')->check())
                                    <button class="btn btn-primary" type="submit"> Add Rating</button>
                                @else
                                    <button class="btn btn-primary" disabled="true" type="submit"> Add Rating</button>
                                @endif

                            </label>
                    </form>
                    <div class="row">

                    </div>

            </div>
            <div class="col-md-9"  style="">
                <img src="{{asset('assets/img/peshtani-map.jpg')}}">
            </div>

        </div>

        <div class="row">
            <div class="col-md-3 text-center pr-4" style="color: white ;line-height: 1.3; font-size: 15px;">

            </div>
            <div class="col-md-9 mt-3 text-right"  >
                <a href="{{$location->id}}/events">
                    <button class="btn btn-primary" type="submit">Види Настани</button>
                </a>
                <a href="">
                    <button class="btn btn-primary" type="submit">Види Коментари</button>
                </a>
            </div>
        </div>

        <hr>
        <div id="comments">

            <ul class="list-group">
                @foreach($location->comments as $comment)

                    <li class="list-group-item">

                        @if(!Auth::user()=="" && $comment->user_id == Auth::user()->id)
                            <form action="{{url('/locations/' . $location->id . '/comments', [$comment->id])}}"
                                  method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="close" value="&times;"/>
                            </form>
                        @endif
                        {{$comment->user -> name}} commented
                        <strong>
                            {{$comment-> created_at ->  diffForHumans()}}
                        </strong>
                        <br>
                        {{$comment-> body}}

                    </li>

                @endforeach
            </ul>
        </div>
        <div class="card">
            <div class="card-block">

                <form method="post" action="/locations/{{$location->id}}/comments">
                    {{csrf_field()}}
                    <div class="form-group">
                     <textarea name="body" placeholder="Your comment here." class="form-control">
                     </textarea>
                    </div>
                    @if(Auth::guard('web')->check())
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"> Add Comment</button>
                    </div>
                        @elseif(Auth::guard('admin')->check())
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" disabled> Add Comment</button>
                        </div>
                        @else
                        <div class="form-group">
                            <a href="/login">
                             <button class="btn btn-primary" type="button"> Add Comment</button>
                            </a>
                        </div>
                    @endif
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection