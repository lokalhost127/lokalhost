@extends('layouts.app')
@section('content')
    {{--<h2 class="text-light">Add New Location</h2>--}}
    {{--<hr>--}}
    <br>
    <div id="createapp" class="container">
        <form action="/admin/locations" method="post">
        <div class="row">
            <div v-if="!createImage" class="col-md-3">

                {{ csrf_field() }}
                <div class="form-group text-light">
                    <label for="name">Име на локација</label>
                    <input type="text" class="form-control form-control-sm" id="locationName" name="name">
                </div>
                <div class="form-group text-light">
                    <label for="address">Адреса</label>
                    <input type="text" class="form-control form-control-sm" id="locationAddress" name="address">
                </div>

                <div class="form-group text-light">
                    <label for="capacity">Контакт</label>
                    <input type="text"  class="form-control form-control-sm" id="locationContact" name="contact">
                </div>

                <div class="form-group text-light">
                    <label for="description">Опис</label>
                    <textarea maxlength="170"  class="form-control form-control-sm" id="locationDescription" style="resize: none" rows="5" name="description"></textarea>
                </div>

                </div>
            <div v-if="createImage" class="col-md-3">

                {{ csrf_field() }}
                <div class="form-group">
                    <label class="text-light" for="sel1">Избери елемент</label>
                    <select class="form-control form-control-sm" id="elements">
                        <option>Маса</option>
                        <option>Шанк</option>
                        <option>Ентериер</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-light" for="sel1">Избери елемент // treba da se sredi so VUE</label>
                    <select class="form-control form-control-sm" id="createdElements">
                        <option></option>
                        <option>Шанк</option>
                        <option>Ентериер</option>
                    </select>
                </div>
                <div id="Images">Slikichki od elementi</div>

                {{--<div class="form-group text-light">--}}
                    {{--<label for="capacity">Контакт</label>--}}
                    {{--<input type="text" class="form-control form-control-sm" id="locationContact" name="contact">--}}
                {{--</div>--}}

                {{--<div class="form-group text-light">--}}
                    {{--<label for="description">Опис</label>--}}
                    {{--<textarea  class="form-control form-control-sm" id="locationDescription" style="resize: none" rows="5" name="description"></textarea>--}}
                {{--</div>--}}



            </div>


            <div class="col-md-9">
                <svg width="100%" height="100%">
                    <g  v-bind:transform="T"><circle id="first" cx="50" cy="50" r="80" stroke="green" stroke-width="4" fill="yellow" />
                    <circle cx="50" cy="60" r="80" stroke="green" stroke-width="4" fill="yellow" />
                    </g>
                </svg>
            </div>
        </div>

        <div class="row">

                <div class="col-md-3 text-center pr-4" style="color: white ;line-height: 1.3; font-size: 15px;">

                </div>
                <div class="col-md-9 mt-3 text-right">

                    <button v-on:click="createImage = false" type=button class="btn btn-primary">Внеси Инфо</button>

                    <button  v-on:click="createImage = true" type=button class="btn btn-primary">Внеси Слика</button>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-danger">Креирај локација</button>

                </div>
        </div>



    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
    <script src="{{asset('assets/js/create.js')}}"></script>
@endsection
