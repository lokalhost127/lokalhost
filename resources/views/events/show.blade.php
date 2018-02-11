@extends('layouts.app')

@section('content')
    <div class="container px-1 mx-6">
        <br>
        <div class="row">
            <div class="col-md-3 text-center pr-4 text-light" style="line-height: 1.3; font-size: 15px;">
                <i class="fa fa-arrow-circle-o-down"></i>
                <p class="h3 text-uppercase">{{ $event->name }}</p>
                <hr style="border-color: rgba(155,160,190,0.95);">
                <p class="text-justify"><strong>Локал: </strong>{{ $event->location->name }}</p>
                @if($event->from=="Expired")
                    <p class="text-left"><strong>Датум: </strong>{{$event->from}}
                @else
                    <p class="text-left">
                        <strong>Датум: </strong> {{ Carbon\Carbon::parse($event->from)->format('d M Y') }}</p>
                    <p class="text-left">
                        <strong>Час: </strong> {{ Carbon\Carbon::parse($event->from)->format('H:i') }}</p>

                @endif
                {{-- @if($event->to=="Expired")
                     <p class="text-left"><strong>Датум до: </strong>{{$event->to}}</p>
                 @else
                     <p class="text-left"><strong>Датум до: </strong> {{ Carbon\Carbon::parse($event->to)->format('d M Y') }}
                         - {{ Carbon\Carbon::parse($event->to)->format('H:i') }}</p>
                 @endif--}}
                <p class="text-left"><strong>Цена за влез:</strong> {{ $event-> price }} </p>
                <br><br><br>
                <hr style="border-color: rgba(155,160,190,0.95);">
                <form action="/locations/{{$location->id}}/events/{{$event->id}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    Резервирај маса со број: <br><select id="table" name="table" class="form-control form-control-sm">
                        <?php $numFreeTables=0?>
                        @foreach($tables as $key=>$table)
                            @if($table->reserved==0)
                                <option value="{{ $table->id }}">
                                    {{ ++$key }}
                                    <?php $numFreeTables++ ?>
                                </option>
                            @endif
                        @endforeach
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if($event-> to > Carbon\Carbon::now() && Auth::guard('web')->check() && $numFreeTables>0)
                            <input type="submit" class="btn btn-danger" value="Резервирај" style="margin-top: 30px"/>
                        @else
                            <input type="submit" disabled class="btn btn-danger" value="Резервирај" style="margin-top: 30px"/>
                        @endif
                    </select>
                </form>
                <div class="row">
                </div>
            </div>
            <div class="col-md-9" style="">
                <img src={{asset('storage/'.$location->image)}}>
            </div>
        </div>
    </div>

@endsection