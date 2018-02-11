<link href="{{ asset('css/cards.css') }}" rel="stylesheet">
@extends('layouts.app')
@if (Auth::guard('admin')->check())
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div>

        <a class="add-local" href="admin/locations/create" title="Креирај нов локал"><i
                    class=" pt-2 fa fa-plus-circle"></i></a>
    </div>
    <div class="container">
        <div class="container-fluid">
            @foreach($locations as $location)
                <div class="card card-blue">
                    <i class="fa fa-photo-circle-o-down"></i>
                    <p class="card-question">{{$location->name}}</p>
                    <div class="card-separator"></div>
                    <p class="card-text"><strong>Адреса: </strong>{{$location->address }}</p>
                    <p class="card-text"><strong>Rating: </strong>{{$location->rating }}</p>
                    <div class="row" style="margin-left: 20px">
                        <div class="col-sx-3">
                            <a href="locations/{{$location->id}}" class="btn btn-sm btn-outline-primary"
                               style="width: 95px">Види локал</a>
                        </div>
                        <div class="col-sx-3">
                            <a href="locations/{{$location->id}}/edit" class="btn btn-sm btn-outline-warning"
                               style="width: 95px">Промени</a>
                        </div>

                        <div class="col-sx-3">

                            <a class="btn btn-sm btn-outline-danger" data-toggle="modal"
                               data-target="#modal-delete-{{ $location->id }}" style="width: 95px">Избриши</a>

                        </div>

                    </div>
                    <div class="card-separator"></div>
                </div>


                {{--modal stuff--}}


            <!-- The Modal -->
                <div class="modal fade" id="modal-delete-{{ $location->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Избриши локација?</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <form action="{{url('admin/locations', [$location->id])}}"
                                      method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Откажи</button>

                                    <button type="submit" class="btn btn-danger">
                                        Избриши
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
@else
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="container">
        <div class="container-fluid">
            @foreach($locations as $location)
                <div class="card card-blue">
                    <i class="fa fa-arrow-circle-o-down"></i>
                    <p class="card-question">{{$location->name}}</p>
                    <div class="card-separator"></div>
                    <p class="card-text"><strong>Адреса: </strong>{{$location->address }}</p>
                    <p class="card-text"><strong>Rating: </strong>{{$location->rating }}</p>
                    <a href="locations/{{$location->id}}" class="btn btn-outline-primary">Види локал</a>
                    <div class="card-separator"></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@endif

