@extends('layouts.app')
@section('content')
    <div class="col-md-4 mx-auto">
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Регистрирај се веднаш!</h3>
                    <p>Ве молиме пополнете ги формите.</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form class="registration-form" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="sr-only" for="name">Name</label>
                        <input type="text" name="name" placeholder="Име и презиме" class="name form-control"
                               id="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="email">Email</label>
                        <input type="text" name="email" placeholder="Email адреса" class="email form-control"
                               id="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-only control-label" for="password">Лозинка</label>
                        <input type="password" name="password" placeholder="Лозинка" class="password form-control"
                               id="password" value="{{ old('password') }}" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="sr-only control-label">Потврди лозинка</label>
                        <input id="password-confirm" placeholder="Потврди Лозинка" type="password" class="form-control"
                               name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn bt">Регистрирај се!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
