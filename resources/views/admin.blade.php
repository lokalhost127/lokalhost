@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    @component('components.who')
                    @endcomponent
                </div>
            </div>

        </div>

    </div>

    <a href="{{ URL::to('/admin/locations') }}">
        <button type="button" class="btn btn-primary"> Your Locations </button>
    </a>
</div>
</div>
@endsection
