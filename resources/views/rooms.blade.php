@extends('layouts.app')

@section('head')


    <title>Rooms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>


    <script src="js/bootstrap.min.js"></script>
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

            -moz-box-shadow: 0 0 5px #ccc;
            -webkit-box-shadow: 0 0 5px #ccc;
            box-shadow: 0 0 5px #ccc;
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

        .room-infos {
            padding-left: 15px;
        }

        .room-type {
            font-weight: bold;
        }

        .reviews {
            text-decoration: none;
            float: right;
            font-size: 15px;
            font-weight: bold;
            padding-left: 20px;
        }

        .room-price {
            padding: 25px;
            text-align: center;
        }

        .price {
            font-weight: bold;
            font-size: 20px;
        }

        .mybutton {
            margin-top: 10px;
            width: 80%;

        }


    </style>
@endsection

@section('content')
    <div class="container">
        @if(count($rooms)!=0)
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rooms

                    </h1>

                </div>
            </div>

    </div>



    <br/>

    <section class="rooms-list">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">


                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                              action="{{ url('/filteredRooms') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price Under</label>
                                  <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="check_the_price" style="width:80%" type="number"
                                                   class="form-control"
                                                   name="price"
                                                   onchange="checknumber('check_the_price','error_price')"
                                                   placeholder="Price $"
                                                   value="{{ old('price') }}" autofocus>
                                            <span class="help-block">
                                        <strong id="error_price" style="color: #bc1103;"></strong></span>
                                            @if ($errors->has('price'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>



                                </div>



                            <div class="form-group">
                                <label for="exampleSelect1">Ratings Greater Than</label>
                                <select class="form-control" id="rating" name="rating" style="width:80%">
                                    <option value="5">Excellent (5 stars)</option>
                                    <option value="4.5">Good (4.5 stars)</option>
                                    <option value="3.5">Okay (3.5 stars)</option>
                                    <option value="2.5">Mediocre (2.5 stars)</option>
                                    <option value="1.5">Poor (1.5 stars)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Room Type</label>
                                <select class="form-control" id="type" name="type" style="width:80%">
                                    <option value="Single Room">Single Rooms</option>
                                    <option value="Double Room">Double Rooms</option>
                                    <option value="Suite">Suites</option>
                                </select>
                            </div>


                            <center><h3 style="margin-right: 80px">OR search by</h3></center>
                            <br/>
                            <div class="form-group">
                                <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">

                                    <div class="col-md-12">
                                        <input id="check_the_room" onchange="checknumber('check_the_room','error_name')"
                                               style="width:80%" type="number" class="form-control"
                                               name="room"
                                               placeholder="Room Number"
                                               value="{{ old('room') }}" autofocus>
                                        <span class="help-block">
                                        <strong id="error_name" style="color: #bc1103;"></strong></span>
                                        @if ($errors->has('room'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                            </div>


                            <button type="submit" style="width:80%" class="btn btn-primary">Find Rooms</button>
                        </form>


                    </aside>
                    <!-- end sidebar -->
                </div>
                <!-- end col-4 -->
                <div class="col-md-8  col-sm-12 col-xs-12">
                @foreach($rooms as $room)
                    <!-- end rooms-top-bar -->
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-4">
                                    <figure>
                                        @if($room->type->name == 'Single Room')<img width="248" height="160"
                                                                                    src="images/single.jpg" alt="Image">
                                        @elseif ($room->type->name == 'Double Room') <img width="248" height="160"
                                                                                          src="images/double.jpg"
                                                                                          alt="Image">
                                        @elseif ($room->type->name == 'Suite') <img width="248" height="160"
                                                                                    src="images/suites.jpg" alt="Image">
                                        @endif
                                    </figure>
                                </div>
                                <div class="col-sm-4">
                                    <div class="room-infos">
                                        <h3 class="room-type">{{$room->type->name}}</h3>


                                        @if($room->ratings == 0)
                                            <span class="room-rates"> <img src="images/empty.png" alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"> </span>
                                            <br/><br/>
                                        @elseif($room->ratings == 0.5)
                                            <span class="room-rates"> <img src="images/half.png" alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"> </span>
                                            <br/><br/>
                                        @elseif($room->ratings == 1)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"> </span>
                                            <br/><br/>
                                        @elseif($room->ratings == 1.5)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/half.png" alt="Image"><img src="images/empty.png"
                                                                                               alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"> </span>
                                            <br/><br/>
                                        @elseif($room->ratings == 2)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/empty.png"
                                                                                              alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"> </span>
                                            <br/><br/>
                                        @elseif($room->ratings == 2.5)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/half.png"
                                                                                              alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"> </span>
                                            <br/><br/>
                                        @elseif($room->ratings == 3)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/asa.png"
                                                                                              alt="Image"><img
                                                        src="images/empty.png" alt="Image"><img src="images/empty.png"
                                                                                                alt="Image"> </span>
                                            <br/><br/>
                                        @elseif($room->ratings == 3.5)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/asa.png"
                                                                                              alt="Image"><img
                                                        src="images/half.png" alt="Image"><img src="images/empty.png"
                                                                                               alt="Image"> </span><br/>
                                            <br/>
                                        @elseif($room->ratings == 4)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/asa.png"
                                                                                              alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/empty.png"
                                                                                              alt="Image"> </span><br/>
                                            <br/>
                                        @elseif($room->ratings == 4.5)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/asa.png"
                                                                                              alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/half.png"
                                                                                              alt="Image"> </span><br/>
                                            <br/>
                                        @elseif($room->ratings == 5)
                                            <span class="room-rates"> <img src="images/asa.png" alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/asa.png"
                                                                                              alt="Image"><img
                                                        src="images/asa.png" alt="Image"><img src="images/asa.png"
                                                                                              alt="Image"> </span><br/>
                                            <br/>
                                        @endif


                                        <p><span>Bed:</span> {{$room->beds}} King and {{$room->sofabeds}} Sofabed</p>
                                        <p><span>Max:</span> {{$room->max_people}} People</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="room-price"><span class="price">${{$room->price}}
                                            <small>/night</small></span><br/>
                                        <a href="{{url('/roomDetails/'.$room->id)}}" class="btn btn-primary mybutton">Details</a>
                                        <br/>
                                        @if(Auth::check())
                                            @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'Manager')
                                                @if($room->status == 0)
                                                    <img style="float:left" heigh="50px" width="50px"
                                                         src="images/need_approval.png"> <p
                                                            style="margin-top: 17px;font-weight:bold">Not Approved</p>
                                                @elseif($room->status == 1)
                                                    <img style="float:left" heigh="50px" width="50px"
                                                         src="images/approved.png"> <p
                                                            style="margin-top: 17px;margin-right: 10px;font-weight:bold">
                                                        Approved</p>
                                                @endif
                                            @else
                                                @if($room->booked == 0)<a href="{{url('/bookRoom/'.$room->id)}}"
                                                                          class="btn btn-primary mybutton">Boom
                                                    Room</a>@else<a
                                                        class="btn btn-primary disabled mybutton">Booked</a>@endif
                                            @endif
                                        @else
                                            @if($room->booked == 0)<a href="{{url('/bookRoom/'.$room->id)}}"
                                                                      class="btn btn-primary mybutton">Boom
                                                Room</a>@else<a
                                                    class="btn btn-primary disabled mybutton">Booked</a>@endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- end room-infos -->
                            <!-- end room-price -->
                        </div>
                        <!-- end room-box -->
                        <br/>
                    @endforeach
                    {{--<div class="card">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-sm-4"><figure><img src="images/room-list1.jpg" alt="Image"> </figure></div>--}}
                    {{--<div class="col-sm-4">--}}
                    {{--<div class="room-infos">--}}
                    {{--<h3 class="room-type">Family Room</h3>--}}
                    {{--<span class="room-rates"> <img src="images/asa.png" alt="Image"><img src="images/asa.png" alt="Image"><img src="images/asa.png" alt="Image"><img src="images/asa.png" alt="Image"><img src="images/empty.png" alt="Image"> <br/><br/>--}}
                    {{--<p><span>Bed:</span> 2 King and 1 Sofabed</p>--}}
                    {{--<p><span>Max:</span> 4 People</p>--}}
                    {{--</div></div>--}}
                    {{--<div class="col-sm-4"><div class="room-price"> <span class="price">$102<small>/night</small></span><br/> <a href="room_details.html" class="btn btn-primary mybutton">Details</a> <br/><a href="book_a_room.html" class="btn btn-primary mybutton">Boom Room</a></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<!-- end room-infos -->--}}
                    {{--<!-- end room-price -->--}}
                    {{--</div>--}}
                    <br/>
                    <!-- end room-box -->
                    <!-- end pagination -->
                </div>
                <!-- end col-8 -->

            </div>
        </div>
        <br/>
        <!-- end row -->

        <!-- end container -->
    </section>

    @else
        <br/>
        <br/>
        <div class="alert alert-info">
            <center><h1>No Rooms Found !!</h1></center>
        </div>
    @endif

    <br/>

@endsection
@section('scripts')
    <script>

        function checknumber(id, errorid) {
            var check = document.getElementById(id).value;
            if (Number(check) >= 0) {
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
                span.appendChild(document.createTextNode("This Field cannot have a Negative Value"));
                document.getElementById(id).style.borderColor = '#FF0013';
                document.getElementById(id).value = null;
            }
        }
    </script>
@endsection