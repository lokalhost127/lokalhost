<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


    <script>
        window.Laravel ={!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<style>
    .nav-link, .navbar-brand {
        color: white !important;
    }
</style>
<body style="background: #445e83 url({{asset('assets/img/backgrounds/1.jpg')}}) ">
<div id="app">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(45,56,75,0.92);">
        <div class=" container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav col-md-8">
                    @if(Auth::guard('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/locations') }}"> Мои Локали </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/events') }}"> Мои Настани </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/locations') }}">Локали</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/events') }}"> Настани </a>
                        </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav list-inline ml-auto">

                    @if (!Auth::guard('web')->check() && !Auth::guard('admin')->check())
                        {{--<ul class="navbar-nav mr-auto">--}}
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Најава
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/login') }}">Најава - корисник</a>
                                    <a class="dropdown-item" href="{{ url('/admin/login') }}">Најава - хост</a>
                                </div>
                            </div>
                        </li>&nbsp;
                        <a class="btn btn-info" href="{{ route('register') }}">Регистрација</a>
                </ul>
                @elseif(Auth::guard('admin')->check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth::guard('admin')-> user() -> name }} <span class="caret"></span>
                                </button>

                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-item">
                                        <a class="dropdown-item" href="{{ route('logout')}}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Одјави се
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                @elseif(Auth::guard('web')->check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </button>

                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{ route('reservations')}}">
                                        Мои резревации
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout')}}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Одјави се
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('assets/js/placeholder.js')}}"></script>
<script src="{{asset('assets/js/vue.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

</body>
</html>
