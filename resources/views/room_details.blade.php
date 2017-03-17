@extends('layouts.app')

@section('head')


    <title>Room Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
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
            font-size: 15px;
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
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Room Details
                    @if(Auth::check() )
                        @if(Auth::user()->name == 'Manager')
                            <a data-toggle="modal" data-target="#myModal" class="btn btn-primary mybutton"
                               style="float:right">Edit Room Price</a>

                            @elseif(Auth::user()->name == 'Admin')
                                <a href="{{url('/admin/edit_Room/'.$room->id)}}" class="btn btn-primary mybutton"
                                   style="float:right">Edit Room</a>
                        @else
                            @if((!Auth::check() )|| ($room->booked == 1))
                                @if($room->booked == 1) <p style="float:right;margin-top: 15px">Room Booked Till :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                            style="color:blue;font-weight:thick;font-size:15px">{{$room->ending_date_of_booking}}</span>
                                </p>
                                @endif
                            @elseif(Auth::user()->name == 'Admin')
                            @else
                                <a href="{{url('/bookRoom/'.$room->id)}}" class="btn btn-primary mybutton"
                                   style="float:right">Book Room</a>
                            @endif
                        @endif
                    @else
                        @if((!Auth::check() )|| ($room->booked == 1))
                            @if($room->booked == 1) <p style="float:right;margin-top: 15px">Room Booked Till :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                        style="color:blue;font-weight:thick;font-size:15px">{{$room->ending_date_of_booking}}</span>
                            </p>
                            @endif
                        @else
                            <a href="{{url('/bookRoom/'.$room->id)}}" class="btn btn-primary mybutton"
                               style="float:right">Book Room</a>
                        @endif
                    @endif
                </h1>
            </div>
        </div>


        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for($i = 0;$i<count($room->pictures);$i++)
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i?>"
                        class="<?php echo ($i === 0) ? ' active' : ''; ?>"></li>
                @endfor
            </ol>


            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @for($i = 0;$i<count($room->pictures);$i++)

                    <div class="item<?php echo ($i === 0) ? ' active' : ''; ?>">
                        <img src="{{ URL::asset('images/'.$room->pictures[$i]->path) }}" alt="Image">
                        <div class="carousel-caption">

                        </div>
                    </div>

                @endfor
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

    <br/>
    <div class="container ">
        <h2 class="thick">About</h2>
        <hr>

        <div class="row">
            <div class="col-sm-6">
                <span style="color:blue;font-weight:thick;font-size:15px">Bed : </span> {{$room->beds}} Beds
                and {{$room->sofabeds}} Sofabeds<br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Max People : </span> {{$room->max_people}}
                <br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Room Number : </span> {{$room->room_number}}
            </div>
            <div class="col-sm-6">
                <span style="color:blue;font-weight:thick;font-size:15px">Floor Number : </span> {{$room->floor_number}}
                <br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Room Size : </span> {{$room->room_size}}
                (meter sq) <br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Room Price : </span> {{$room->price}}
                $ <br/>
            </div>
        </div>
        <hr/>

    </div>
    <div class="container">
        <h2 class="thick">Description</h2>
        <hr>
        {{$room->description}}

        <hr/>

        <h2 class="thick ">Amenities</h2>
        <hr>

        <div class="row">
            <div class="col-sm-6">
                <span style="color:blue;font-weight:thick;font-size:15px">Room Service : </span> @if($room->room_service == 1)
                    24 Hours @else Not Available @endif<br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Laundary Service : </span>@if($room->laundary_service == 1)
                    Available @else Not Available @endif <br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Pets Allowed : </span> @if($room->pets == 1)
                    Yes @else No @endif <br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Internet : </span> @if($room->internet == 1)
                    Available @else Not Available @endif
            </div>
            <div class="col-sm-6">
                <span style="color:blue;font-weight:thick;font-size:15px">Facilities for disabled guests : </span> @if($room->facilities_for_disabled == 1)
                    Yes @else No @endif
                <br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Security : </span> @if($room->security == 1)
                    24 Hours @else Not Available @endif <br/>
                <span style="color:blue;font-weight:thick;font-size:15px">Bar : </span> @if($room->bar == 1)
                    Available @else Not Available @endif <br/>
            </div>
        </div>
        <hr/>

        <a href="{{url('/rooms')}}" class="btn btn-primary mybutton" style="width:100%">Return Back to Rooms List</a>


    </div>


    <!-- /.row -->
    <br/>





















    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Price</h4>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/edit_price/'.$room->id) }}">
                            {{ csrf_field() }}

                            <fieldset>

                                <div class="form-group{{ $errors->has('edit_price') ? ' has-error' : '' }}">

                                    <div class="col-md-12">
                                        <input id="edit_price" type="number" class="form-control" name="edit_price" style="width: 48%"
                                               placeholder="Enter New Price"
                                               value="{{ old('edit_price') }}" required autofocus>

                                        @if ($errors->has('edit_price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('edit_price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <button id="submit_rider" name="submit_rider" style="width:47%"
                                        type="submit" class="btn btn-primary btn-sm ">
                                    Edit
                                </button>


                            </fieldset>
                        </form>


                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>

    </div>














@endsection

@section('scripts')

@endsection