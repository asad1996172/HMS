@extends('layouts.app')

@section('head')
    <title>Book Room</title>
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

        }
        .card{
            background-color: #f2f2f2;
            padding:5px;

            -moz-box-shadow: 0 0 10px #ccc;
            -webkit-box-shadow: 0 0 10px #ccc;
            box-shadow: 0 0 10px #ccc;
        }
        .boxhead a {
            text-decoration: none;
        }
        p {
            font-size:16px;
        }
        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            min-height:200px;
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
                    <h1 class="logo">Book Room
                        <small></small>
                    </h1>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Booking Details </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row bootstrap-iso">

                            <div class="col-md-12" style="min-height:160px">
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/process_booking/'.$room->id) }}">
                                    {{ csrf_field() }}

                                    <input id="orignal" type="hidden" class="form-control" name="orignal" value="{{$room->max_people}}" required>
                                    <label for="exampleInputEmail1">Starting Date</label>
                                    <div class="form-group{{ $errors->has('starting_date') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <div class='input-group date' id='datetimepicker1' >
                                            <input id="check_starting_date" onchange="checkdate('check_starting_date','error_in_sd')" type="date" class="form-control" name="starting_date"
                                                   placeholder="Enter Starting Date"
                                                   value="{{ old('starting_date') }}" required autofocus><span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>

										</span>
                                            </div>
                                            @if ($errors->has('starting_date'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('starting_date') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>







                                    {{--<div class='input-group date' id='datetimepicker1' >--}}
                                            {{--<input class="form-control" id="date" name="date" placeholder="Enter Starting Date" type="text" required/>--}}
                                            {{--<span class="input-group-addon">--}}
											{{--<span class="glyphicon glyphicon-calendar"></span>--}}
										{{--</span>--}}
                                        {{--</div>--}}


                                    <label for="exampleInputEmail1">Ending Date</label>
                                    <div class="form-group{{ $errors->has('ending_date') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <div class='input-group date' id='datetimepicker1' >
                                                <input class="form-control" id="check_ending_date" onchange="checkdate('check_ending_date','error_in_ed')" type="date" class="form-control" name="ending_date"
                                                       placeholder="Enter Ending Date"
                                                       value="{{ old('ending_date') }}" required autofocus><span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>

										</span>
                                            </div>
                                            @if ($errors->has('ending_date'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('ending_date') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                        {{--<div class='input-group date' id='datetimepicker1' >--}}
                                            {{--<input class="form-control" id="date" name="date" placeholder="Enter Ending Date" type="text" required/>--}}
                                            {{--<span class="input-group-addon">--}}
											{{--<span class="glyphicon glyphicon-calendar"></span>--}}
										{{--</span>--}}
                                        {{--</div>--}}


                                    <div class="form-group{{ $errors->has('nights') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="check_nights" onchange="checknumber('check_nights','error_in_nights')" type="number" class="form-control" name="nights"
                                                   placeholder="Number Of Nights"
                                                   value="{{ old('nights') }}" required autofocus>
                                            <span  class="help-block">
                                        <strong id="error_in_nights" style="color: #bc1103;"></strong>
                                    </span>
                                            @if ($errors->has('nights'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('nights') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('people') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="check_people" onchange="checknumber('check_people','error_in_people')" type="number" class="form-control" name="people"
                                                   placeholder="Number Of People"
                                                   value="{{ old('people') }}" required autofocus>
                                            <span  class="help-block">
                                        <strong id="error_in_people" style="color: #bc1103;"></strong>
                                    </span>
                                            @if ($errors->has('people'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('people') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>






                                            <input id="people_limit" type="number" class="form-control" name="people_limit"
                                                   value="{{$room->max_people}}"
                                                   disabled ><br>



                                        <button
                                                type="submit" class="btn btn-primary btn-sm pull-right form-control input-md">
                                            Book Room
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
    <script src="{{ URL::asset('js/reg.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
@endsection