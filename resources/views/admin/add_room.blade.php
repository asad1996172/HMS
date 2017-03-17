@extends('layouts.app')
@section('head')
    <title>Add Room</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <link href="{{ URL::asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-iso.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-datepicker3.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        h2.thick {
            font-weight: bold;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #e6e6e6;
            padding: 25px;
            margin-top: 400px;
        }

        .card {
            background-color: #f2f2f2;
            padding: 5px;

            -moz-box-shadow: 0 0 10px #ccc;
            -webkit-box-shadow: 0 0 10px #ccc;
            box-shadow: 0 0 10px #ccc;
        }

        .boxhead a {
            text-decoration: none;
        }

        p {
            font-size: 16px;
        }

        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            min-height: 200px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }


    </style>
@endsection
@section('content')

    <div class="body_login">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="middlePage">
                <div class="page-header">
                    <h1 class="logo">Add Room
                        <small></small>
                    </h1>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Room Details </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row bootstrap-iso">

                            <div class="col-md-12" style="min-height:160px">
                                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" enctype="multipart/form-data"
                                      action="{{ url('/admin/addRoom') }}">
                                    {{ csrf_field() }}

                                    <fieldset>

                                        <div class="form-group{{ $errors->has('ratings') ? ' has-error' : '' }}">

                                            <div class="col-md-12">

                                                <label for="ratings">Ratings</label>
                                                <select name="ratings" class="form-control" id="ratings"
                                                        style="width:100%" required>
                                                    <option value="5" >Excellent (5 stars)</option>
                                                    <option value="4.5" >Good (4.5 stars)</option>
                                                    <option value="3.5" >Okay (3.5 stars)</option>
                                                    <option value="2.5" >Mediocre (2.5 stars)</option>
                                                    <option value="1.5" >Poor (1.5 stars)</option>
                                                </select>

                                                @if ($errors->has('ratings'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('ratings') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">

                                            <div class="col-md-12">

                                                <label for="type">Room Type</label>
                                                <select name="type" class="form-control" id="type" style="width:100%"
                                                        required>
                                                    <option value="Single" >Single Room</option>
                                                    <option value="Double" >Double Room</option>
                                                    <option value="Suite" >Suite</option>
                                                </select>

                                                @if ($errors->has('type'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <label for="room_pictures">Room Pictures</label>
                                        {{--<input type="file" class="form-control" placeholder="Picutres Of Room" id="profilepicture" name="pic" accept="image/*"  multiple required></br>--}}


                                        <div class="form-group{{ $errors->has('room_pictures') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="room_pictures" type="file" class="form-control"
                                                       name="room_pictures[]"
                                                       value="{{ old('room_pictures') }}" accept="image/*" multiple
                                                       required autofocus>

                                                @if ($errors->has('room_pictures'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_pictures') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="check_price" onchange="checknumber('check_price','error_in_price')" type="number" class="form-control" name="price"
                                                       placeholder="Price $"
                                                       value="{{ old('price') }}" required autofocus>
                                                <span  class="help-block">
                                        <strong id="error_in_price" style="color: #bc1103;"></strong>
                                    </span>
                                                @if ($errors->has('price'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('beds') ? ' has-error' : '' }}">

                                                    <div class="col-md-12">
                                                        <input id="check_beds" onchange="checknumber('check_beds','error_in_beds')" type="number" class="form-control"
                                                               name="beds"
                                                               placeholder="Number of Beds"
                                                               value="{{ old('beds') }}" required autofocus>
                                                        <span  class="help-block">
                                        <strong id="error_in_beds" style="color: #bc1103;"></strong>
                                    </span>
                                                        @if ($errors->has('beds'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('beds') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('sofabeds') ? ' has-error' : '' }}">

                                                    <div class="col-md-12">
                                                        <input id="check_sofabeds" onchange="checknumber('check_sofabeds','error_in_sofabeds')" type="number" class="form-control" name="sofabeds"
                                                               placeholder="Number of Sofabeds"
                                                               value="{{ old('sofabeds') }}" required autofocus>
                                                        <span  class="help-block">
                                        <strong id="error_in_sofabeds" style="color: #bc1103;"></strong>
                                    </span>
                                                        @if ($errors->has('sofabeds'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('sofabeds') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-group{{ $errors->has('room_size') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="check_room_size" onchange="checknumber('check_room_size','error_in_room_size')" type="number" class="form-control" name="room_size"
                                                       placeholder="Room Size in mete sq."
                                                       value="{{ old('room_size') }}" required autofocus>
                                                <span  class="help-block">
                                        <strong id="error_in_room_size" style="color: #bc1103;"></strong>
                                    </span>
                                                @if ($errors->has('room_size'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_size') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('max_people') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="check_max_people" onchange="checknumber('check_max_people','error_in_max_people')" type="number" class="form-control" name="max_people"
                                                       placeholder="Max People"
                                                       value="{{ old('max_people') }}" required autofocus>
                                                <span  class="help-block">
                                        <strong id="error_in_max_people" style="color: #bc1103;"></strong>
                                    </span>
                                                @if ($errors->has('max_people'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('max_people') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="check_room_number" onchange="checknumber('check_room_number','error_in_room_number')" type="number" class="form-control" name="room_number"
                                                       placeholder="Room Number"
                                                       value="{{ old('room_number') }}" required autofocus>
                                                <span  class="help-block">
                                        <strong id="error_in_room_number" style="color: #bc1103;"></strong>
                                    </span>
                                                @if ($errors->has('room_number'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_number') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>




                                        <div class="form-group{{ $errors->has('floor_number') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="check_floor_number" onchange=" checknumber('check_floor_number','error_in_floor_number')" type="number" class="form-control" name="floor_number"
                                                       placeholder="Floor Number"
                                                       value="{{ old('floor_number') }}" required autofocus>
                                                <span  class="help-block">
                                        <strong id="error_in_floor_number" style="color: #bc1103;"></strong>
                                    </span>
                                                @if ($errors->has('floor_number'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('floor_number') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <textarea id="description" type="text" class="form-control" name="description"
                                                       placeholder="Enter the Room Description" rows="4"
                                                        required autofocus> {{ old('description') }}</textarea>

                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="checkbox-1" name="checkbox[]" type="checkbox" value="room_service">24 hours Room Service
                                                        {{--<input id="room_service" name="room_service" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="checkbox-2" name="checkbox[]" type="checkbox" value="laundary_service">Laundary Service
                                                        {{--<input id="laundary" name="laundary" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="checkbox-3" name="checkbox[]" type="checkbox" value="pets">Pets Allowed
                                                        {{--<input id="pets" name="pets" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="checkbox-4" name="checkbox[]" type="checkbox" value="internet">Internet
                                                        {{--<input id="internet" name="internet" type="hidden" value="0">--}}
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="checkbox-5" name="checkbox[]" type="checkbox" value="facilities_for_disabled">Facilities for disabled guests
                                                        {{--<input id="disabled" name="disabled" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="checkbox-6" name="checkbox[]" type="checkbox" value="security">Security
                                                        {{--<input id="security" name="security" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="checkbox-7" name="checkbox[]" type="checkbox" value="bar">Bar
                                                        {{--<input id="bar" name="bar" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>

                                        <button id="submit_rider" name="submit_rider"
                                                type="submit"
                                                class="btn btn-primary btn-sm pull-right form-control input-md">
                                            Add Room
                                        </button>


                                    </fieldset>
                                </form>


                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4"></div>
    </div>





    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
@endsection

@section('scripts')
    <script>


        function checknumber(id, errorid) {
            var check = document.getElementById(id).value;
            if (Number(check) > 0) {
                document.getElementById(id).style.borderColor = '#006314';
                var span = document.getElementById(errorid);

                while (span.firstChild) {
                    span.removeChild(span.firstChild);
                }
                span.appendChild(document.createTextNode(""));
            }
            else {
                var span = document.getElementById(errorid);

                while (span.firstChild) {
                    span.removeChild(span.firstChild);
                }
                span.appendChild(document.createTextNode("This Field must have a value greater than 0"));
                document.getElementById(id).style.borderColor = '#FF0013';
                document.getElementById(id).value = null;
            }
        }
    </script>
@endsection
