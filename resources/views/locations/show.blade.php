@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Showing Location {{ $location->name }}</h1>

        <div class="jumbotron text-center">
            <p>
                <strong>Location Name:</strong> {{ $location->name }}<br>
                <strong>Location Address:</strong> {{ $location->address }}<br>
                <strong>Description:</strong> {{ $location->description }} <br>
                <strong>Capacity:</strong> {{ $location->capacity }} <br>
                <strong>Rating:</strong> {{ $location->rating }} <br>

            </p>
        </div>


        <form action="/locations/{{$location->id}}/ratings" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Rating
                <input type="number" name="star" max="5" min="1">
                <button class="btn btn-primary" type="submit"> Add Rating</button>
            </label>
        </form>
        <a href="{{$location->id}}/events">
            <button class="btn btn-primary" type="submit">Види Настани</button>
        </a>
        <hr>
        <div id="comments">

            <ul class="list-group">
                @foreach($location->comments as $comment)
                    <li class="list-group-item">
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
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"> Add Comment</button>
                    </div>
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