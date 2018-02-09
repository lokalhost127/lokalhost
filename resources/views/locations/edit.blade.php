@extends('layouts.app')

@section('content')
    <div class="col-md-4 mx-auto">
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Промени локал</h3>
                    <p>Ве молиме пополнете ги формите.</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-edit"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form action="{{url('admin/locations', [$location->id])}}"
                      method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="sr-only"  for="name">Име на локација</label>
                        <input type="text" value="{{$location->name}}" class="name form-control" id="locationName" name="name" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label class="sr-only control-label" for="description">Опис</label>
                            <input type="text" value="{{$location->description}}" class="form-control" id="locationDescription"
                                   name="description">
                        </div>
                        @if ($errors->has('from'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="from">Адреса</label>
                        <input type="text" value="{{$location->address}}" class="form-control" id="locationAddress" name="address">

                        @if ($errors->has('to'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="price">Капацитет</label>
                        <input type="number" value="{{$location->capacity}}" class="form-control" id="locationCapacity"
                               name="capacity">
                        @if ($errors->has('price'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                        @endif
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Зачувај промени!</button>
                </form>
            </div>
        </div>
    </div>

    {{--<form action="{{url('admin/locations', [$location->id])}}" method="POST">--}}
        {{--<input type="hidden" name="_method" value="PUT">--}}
        {{--{{ csrf_field() }}--}}
        {{--<div class="form-group">--}}
            {{--<label for="name">Location Name</label>--}}
            {{--<input type="text" value="{{$location->name}}" class="form-control" id="locationName" name="name">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="description">Location Description</label>--}}
            {{--<input type="text" value="{{$location->description}}" class="form-control" id="locationDescription"--}}
                   {{--name="description">--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<label for="address">Location Address</label>--}}
            {{--<input type="text" value="{{$location->address}}" class="form-control" id="locationAddress" name="address">--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<label for="capacity">Location Capacity</label>--}}
            {{--<input type="number" value="{{$location->capacity}}" class="form-control" id="locationCapacity"--}}
                   {{--name="capacity">--}}
        {{--</div>--}}


        {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
    {{--</form>--}}

    {{--<a href="{{ URL::to('/admin/locations/' . $location->id . '/events/create') }}"> Create Event</a>--}}

@endsection
