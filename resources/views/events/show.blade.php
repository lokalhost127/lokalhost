@extends('layouts.app')

@section('content')
    <div id="showEvent" class="container px-1 mx-6">
        <br>
        <div class="row">
            <div class="col-md-3 text-center pr-4 text-light" style="line-height: 1.3; font-size: 15px;">
                <i class="fa fa-coffeep fa-2x"></i>
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
                    <p class="text-left">
                        <strong>Контакт: </strong> {{ $event->location->contact }}</p>

                @endif
                {{-- @if($event->to=="Expired")
                     <p class="text-left"><strong>Датум до: </strong>{{$event->to}}</p>
                 @else
                     <p class="text-left"><strong>Датум до: </strong> {{ Carbon\Carbon::parse($event->to)->format('d M Y') }}
                         - {{ Carbon\Carbon::parse($event->to)->format('H:i') }}</p>
                 @endif--}}
                <p class="text-left"><strong>Цена за влез:</strong> {{ $event-> price }} </p>
                <hr style="border-color: rgba(155,160,190,0.95);">
                <?php $alreadyReserved=0?>
                @foreach($tables as $table)
                    @if($table->user_id==Auth::guard('web')->id())
                        <?php $alreadyReserved=1 ?>
                    @endif
                @endforeach


                <form action="/locations/{{$location->id}}/events/{{$event->id}}" method="post">
                    <input type="hidden" name="_method" value="PUT">

                    {{ csrf_field() }}
                    Резервирај маса со број: <br><select @change="saveTable" id="table" name="table" class="form-control form-control-sm">
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
                            <input type="hidden" name="tableNumber" v-bind:value="tableNumber">
                        @if($event-> to > Carbon\Carbon::now() && Auth::guard('web')->check() && $numFreeTables>0 &&!$alreadyReserved)
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
        <br><br>
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
            <p style="color: #ededed">Забелешка: Можете да резервирате само една маса. Доколку сакате да резервирате повеќе, контактирајте не! Ви благодариме!</p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
    <script src="{{asset('assets/js/sendNumber.js')}}"></script>

@endsection