@extends('layouts.app')
<link rel="stylesheet" href="{{asset('assets/css/form-elements.css')}}">

@section('content')

    <div class="col-md-4 mx-auto">
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Најава - Корисник!</h3>
                    <p>Внеси ја email адресата и лозинката.</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="email">Емаил адреса</label>
                        <input type="text" name="email" placeholder="Емаил адреса" class="email form-control" id="email"
                               value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="password">Лозинка</label>
                        <input type="password" name="password" placeholder="Лозинка" class="password form-control"
                               id="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Најави се!</button>
                </form>
            </div>
        </div>
    </div>
@endsection
