@extends('layouts.app')
@section('content')

    <div class="col-md-4 mx-auto">
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Креирај нов настан!</h3>
                    <p>Ве молиме пополнете ги формите.</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form action="{{url('admin/locations/'. $location->id . '/events' , [$event->id] )}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="sr-only" for="name">Име на настан</label>
                        <input type="text" name="name" placeholder="Име на настан" class="name form-control"
                               id="locationName" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="from">Датум/Време од</label>
                        <input type="datetime-local" name="from" placeholder="Датум/Време од" class="from form-control"
                               id="from" value="{{ old('from') }}" required>
                        @if ($errors->has('from'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="to">Датум/Време до</label>
                        <input type="datetime-local" name="to" placeholder="Датум/Време до" class="to form-control"
                               id="to" value="{{ old('to') }}" required>
                        @if ($errors->has('to'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="price">Датум/Време до</label>
                        <input type="number" name="price" placeholder="Цена" class="price form-control"
                               id="price" value="{{ old('price') }}" required>
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
                    <div class="form-group">
                        <button type="submit" class="btn bt">Креирај настан!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    {{--<h1>Add New Event for {{$location->id}} </h1>
    <hr>
    <form action="{{url('admin/locations/'. $location->id . '/events' , [$event->id] )}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" id="locationName"  name="name">
        </div>
        <div class="form-group">
            <label for="from"> From </label>
            <input type="datetime-local" class="form-control" id="from" name="from">
        </div>

        <div class="form-group">
            <label for="to">To</label>
            <input type="datetime-local" class="form-control" id="to" name="to">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>--}}
@endsection
