@extends('layouts.app')

@section('content')

    <div class="col-md-4 mx-auto">
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Промени настан</h3>
                    <p>Ве молиме пополнете ги формите.</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-edit"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form action="{{url('admin/locations/' . $event->location_id . '/events', [$event->id])}}"
                      method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="sr-only" for="name">Име на настан</label>
                        <input type="text" name="name" placeholder="Име на настан" class="name form-control"
                               id="locationName" value="{{$event->name}}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="from">Од</label>
                        <input type="datetime-local" name="from" placeholder="Од" class="from form-control"
                               id="from" value="{{$event->from}}" required>
                        @if ($errors->has('from'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="from">До</label>
                        <input type="datetime-local" name="to" placeholder="До" class="to form-control"
                               id="to" value="{{$event->to}}" required>
                        @if ($errors->has('to'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="price">Цена за влез</label>
                        <input type="number" name="price" placeholder="Цена за влез" class="price form-control"
                               id="price" value="{{$event->price}}" required>
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
@endsection
