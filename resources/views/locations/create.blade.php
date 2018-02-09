@extends('layouts.app')

@section('content')
    {{--<h2 class="text-light">Add New Location</h2>--}}
    {{--<hr>--}}
    <br>
    <div id="createapp" class="container">
        <form action="/admin/locations" method="post">
        <div class="row">
            <div v-bind:style="showInfo" class="col-md-3">

                {{ csrf_field() }}
                <div class="form-group text-light">
                    <label for="name">Име на локација</label>
                    <input @change="saveLocationName" v-bind:value="locationName" type="text" class="form-control form-control-sm" id="locationName" name="name">
                </div>
                <div class="form-group text-light">
                    <label for="address">Адреса</label>
                    <input @change="saveLocationAddress" v-bind:value="locationAddress" type="text" class="form-control form-control-sm" id="locationAddress" name="address">
                </div>

                <div class="form-group text-light">
                    <label for="contact">Контакт</label>
                    <input @change="saveLocationContact" v-bind:value="locationContact" type="text"  class="form-control form-control-sm" id="locationContact" name="contact">
                </div>

                <div class="form-group text-light">
                    <label for="description">Опис</label>
                    <textarea @change="saveLocationDescription" v-bind:value="locationDescription" maxlength="170"  class="form-control form-control-sm" id="locationDescription" style="resize: none" rows="5" name="description"></textarea>
                </div>

                </div>
            <div  v-bind:style="showImageInfo" class="col-md-3">
                {{ csrf_field() }}
                <div class="form-group" @change="handleChange">
                    <label class="text-light" for="sel1">Избери елемент</label>
                    <select class="form-control form-control-sm" id="elements">
                        <option value="0">Избери елемент</option>
                        <option value="background-0">Позадина</option>
                        <option value="background-1">Позадина 1</option>
                        <option value="background-2">Позадина 2</option>
                        <option value="table-0">Маса</option>
                        <option value="table-1">Маса 1</option>
                        <option value="table-2">Маса 2</option>
                        <option value="table-3">Маса 3</option>
                        <option value="table-4">Маса 4</option>
                        <option value="bar-0">Шанк</option>
                        <option value="bar-1">Шанк 1</option>
                        <option value="bar-2">Шанк 2</option>
                        <option value="foreground-0">Декорација 1</option>
                        <option value="foreground-4">Декорација 2</option>
                        <option value="foreground-1">Светло 1</option>
                        <option value="foreground-2">Декорација 3</option>
                        <option value="foreground-3">Тепих 1</option>
                        <option value="foreground-5">Тепих 2</option>

                    </select>
                </div>
                <img class="text-light" id="showComponent" v-bind:src="showItem">

                <div class="form-group">
                    <label class="text-light" for="sel1">Креирани елементи</label>

                    <select @change="selectItem" class="form-control form-control-sm" id="createdElements">
                        <option v-for:="obj in createdObjects"> @{{ obj }} </option>
                    </select>
                </div>
                <div class="text-light" id="Images">Навигација</div>

                <div class="mb-3">
                    <button v-on:click="left()" type=button class="btn btn-primary"><i class="fa fa-arrow-left"></i></button>

                    <button v-on:click="down()" type=button class="btn btn-primary"><i class="fa fa-arrow-down"></i></button>
                    <button v-on:click="top()" type=button class="btn btn-primary"><i class="fa fa-arrow-up"></i></button>
                    <button v-on:click="right()" type=button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
                </div>
                <div >
                    <div class="float-left ">
                    <label class="text-light float-left">Чекор &nbsp;</label> <input v-on:change="stepChange" type="number" name="quantity" min="1" max="100"></div>
                    <div class="float-right ">
                        <label class="text-light text-right">Маси: </label> <label  class="text-light"> @{{tableNumber}} </label></div>

                </div>


            </div>
            <div class="col-md-9">
                <div>
                <svg width="841px" height="429px" id="svg-canvas" viewBox="0 0 403 206">

                    <defs>
                        <linearGradient id="bg-0-gradient" gradientUnits="userSpaceOnUse" x1="197.491" y1="1.29375" x2="197.491" y2="206.901">
                            <stop offset="0" stop-opacity="1" stop-color="#262E57"/>
                            <stop offset="1" stop-opacity="1" stop-color="#9274AB"/>
                        </linearGradient>
                        <mask id="mask1">
                        <linearGradient id="gradient1" gradientUnits="userSpaceOnUse" x1="175.687" y1="52.0105" x2="-43.8896" y2="52.0105">
                         <stop offset="0" stop-opacity="1" stop-color="white"/>
                         <stop offset="0.521569" stop-opacity="-95.8784" stop-color="white"/><stop offset="1" stop-opacity="0" stop-color="white"/>
                          </linearGradient>

                          </mask>
                        <mask id="mask2">
                         <linearGradient id="gradient2" gradientUnits="userSpaceOnUse" x1="26.9451" y1="5.95209" x2="26.9456" y2="24.6062">
                         <stop offset="0" stop-opacity="1" stop-color="white"/>
                         <stop offset="1" stop-opacity="0" stop-color="white"/>
                         </linearGradient>
                         </mask>
                    </defs>
                    <rect cx="0" cy="0" fill="#E2E7F0" height="900" width="450"></rect>

                </svg>

                </div>
            </div>
        </div>


        <div class="row">

                <div class="col-md-3 text-center pr-4" style="color: white ;line-height: 1.3; font-size: 15px;">
                    <div class="mt-3" v-bind:style="showImageInfo">
                        <button v-on:click="add()" type=button class="btn btn-primary">Внеси</button>
                        <button v-on:click="deleteEl()" type=button class="btn btn-primary">Избриши</button>
                    </div>
                </div>
                <div class="col-md-9 mt-3 text-right">
                    <div class="float-right">
                        <button v-on:click="toggleView('info')" type=button class="btn btn-primary">Внеси Инфо</button>

                        <button  v-on:click="toggleView('image')" type=button class="btn btn-primary">Внеси Слика</button>
                        <button type="submit" class="btn btn-danger">Креирај локација</button></div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                </div>
        </div>
    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
    <script src="{{asset('assets/js/create.js')}}"></script>
@endsection
