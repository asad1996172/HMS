@extends('layouts.app')
@section('head')
    <title>Edit Room</title>
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
                    <h1 class="logo">Edit Room
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
                                      action="{{ url('/admin/edit_this_Room/'.$room->id) }}">
                                    {{ csrf_field() }}

                                    <fieldset>

                                        <div class="form-group{{ $errors->has('ratings') ? ' has-error' : '' }}">

                                            <div class="col-md-12">

                                                <label for="ratings">Ratings</label>
                                                <select name="ratings" class="form-control" id="ratings"
                                                        style="width:100%" required>
                                                    @if($room->ratings == 5)
                                                        <option value="5" selected>Excellent (5 stars)</option>
                                                    @else
                                                        <option value="5" >Excellent (5 stars)</option>
                                                    @endif

                                                        @if($room->ratings == 4.5)
                                                            <option value="5" selected>Good (4.5 stars)</option>
                                                        @else
                                                            <option value="4.5" >Good (4.5 stars)</option>
                                                        @endif

                                                        @if($room->ratings == 3.5)
                                                            <option value="5" selected>Okay (3.5 stars)</option>
                                                        @else
                                                            <option value="3.5" >Okay (3.5 stars)</option>
                                                        @endif

                                                        @if($room->ratings == 2.5)
                                                            <option value="5" selected>Mediocre (2.5 stars)</option>
                                                        @else
                                                            <option value="2.5" >Mediocre (2.5 stars)</option>
                                                        @endif

                                                        @if($room->ratings == 1.5)
                                                            <option value="5" selected>Poor (1.5 stars)</option>
                                                        @else
                                                            <option value="1.5" >Poor (1.5 stars)</option>
                                                        @endif




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
                                                    @if($room->type->name == 'Single Room')
                                                        <option value="Single" selected>Single Room</option>
                                                    @else
                                                        <option value="Single" >Single Room</option>
                                                    @endif
                                                        @if($room->type->name == 'Double Room')
                                                            <option value="Double" selected>Double Room</option>
                                                        @else
                                                            <option value="Double" >Double Room</option>
                                                        @endif
                                                        @if($room->type->name == 'Suite')
                                                            <option value="Suite" selected>Suite</option>
                                                        @else
                                                            <option value="Suite" >Suite</option>
                                                        @endif

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
                                                       value="{{ old('room_pictures') }}" accept="image/*" multiple autofocus>

                                                @if ($errors->has('room_pictures'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_pictures') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="price" type="number" class="form-control" name="price"
                                                       placeholder="Price $"
                                                       value={{$room->price}} required autofocus>

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
                                                        <input id="beds" type="number" class="form-control"
                                                               name="beds"
                                                               placeholder="Number of Beds"
                                                               value="{{ $room->beds }}" required autofocus>

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
                                                        <input id="sofabeds" type="number" class="form-control" name="sofabeds"
                                                               placeholder="Number of Sofabeds"
                                                               value="{{ $room->sofabeds }}" required autofocus>

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
                                                <input id="room_size" type="number" class="form-control" name="room_size"
                                                       placeholder="Room Size in mete sq."
                                                       value="{{ $room->room_size }}" required autofocus>

                                                @if ($errors->has('room_size'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_size') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('max_people') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="max_people" type="number" class="form-control" name="max_people"
                                                       placeholder="Max People"
                                                       value="{{ $room->max_people }}" required autofocus>

                                                @if ($errors->has('max_people'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('max_people') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="room_number" type="number" class="form-control" name="room_number"
                                                       placeholder="Room Number"
                                                       value="{{ $room->room_number }}" required autofocus>

                                                @if ($errors->has('room_number'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_number') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>




                                        <div class="form-group{{ $errors->has('floor_number') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <input id="floor_number" type="number" class="form-control" name="floor_number"
                                                       placeholder="Floor Number"
                                                       value="{{ $room->floor_number }}" required autofocus>

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
                                                          required autofocus>{{ $room->description }}</textarea>

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
                                                        @if($room->room_service == 1)
                                                            <input id="checkbox-1" name="checkbox[]" type="checkbox" value="room_service" checked>24 hours Room Service
                                                        @else
                                                            <input id="checkbox-1" name="checkbox[]" type="checkbox" value="room_service" >24 hours Room Service
                                                        @endif
                                                        {{--<input id="room_service" name="room_service" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        @if($room->laundary_service == 1)
                                                            <input id="checkbox-2" name="checkbox[]" type="checkbox" value="laundary_service" checked>Laundary Service
                                                        @else
                                                            <input id="checkbox-2" name="checkbox[]" type="checkbox" value="laundary_service">Laundary Service
                                                        @endif
                                                            {{--<input id="laundary" name="laundary" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        @if($room->pets == 1)
                                                            <input id="checkbox-3" name="checkbox[]" type="checkbox" value="pets" checked>Pets Allowed
                                                        @else
                                                            <input id="checkbox-3" name="checkbox[]" type="checkbox" value="pets">Pets Allowed
                                                        @endif
                                                        {{--<input id="pets" name="pets" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        @if($room->internet == 1)
                                                        <input id="checkbox-4" name="checkbox[]" type="checkbox" value="internet" checked>Internet
                                                        @else
                                                        <input id="checkbox-4" name="checkbox[]" type="checkbox" value="internet">Internet
                                                        @endif

                                                        {{--<input id="internet" name="internet" type="hidden" value="0">--}}
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <label>
                                                        @if($room->facilities_for_disabled == 1)
                                                            <input id="checkbox-5" name="checkbox[]" type="checkbox" value="facilities_for_disabled" checked>Facilities for disabled guests
                                                        @else
                                                            <input id="checkbox-5" name="checkbox[]" type="checkbox" value="facilities_for_disabled">Facilities for disabled guests
                                                        {{--<input id="disabled" name="disabled" type="hidden" value="0">--}}@endif
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        @if($room->security == 1)
                                                        <input id="checkbox-6" name="checkbox[]" type="checkbox" value="security" checked>Security
                                                        @else
                                                        <input id="checkbox-6" name="checkbox[]" type="checkbox" value="security">Security
                                                        @endif
                                                            {{--<input id="security" name="security" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        @if($room->bar == 1)
                                                        <input id="checkbox-7" name="checkbox[]" type="checkbox" value="bar" checked>Bar
                                                        @else
                                                        <input id="checkbox-7" name="checkbox[]" type="checkbox" value="bar">Bar
                                                        @endif
                                                            {{--<input id="bar" name="bar" type="hidden" value="0">--}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>

                                        <button id="submit_rider" name="submit_rider"
                                                type="submit"
                                                class="btn btn-primary btn-sm pull-right form-control input-md">
                                            Edit Room
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

@endsection
