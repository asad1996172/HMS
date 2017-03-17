@extends('layouts.app')
@section('head')
    <title>Pending Rooms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <link href="{{ URL::asset('registration.css') }}" rel="stylesheet">
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
            position: absolute;
            width: 100%;
            bottom: 0px;
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
    <div class="container">
        @if(count($rooms)!=0)
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pending Rooms

                    </h1>
                </div>
            </div>


            <h2>Rooms Needing Approval</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Room Type</th>
                        <th>Price</th>
                        <th>Room No.</th>
                        @if(Auth::user()->name == 'Manager')
                        <th></th>
                        @endif
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($rooms as $room)
                        <tr>
                            <td>{{$room->type->name}}</td>
                            <td>${{$room->price}} / Night</td>
                            <td>{{$room->room_number}}</td>
                            @if(Auth::user()->name == 'Manager')
                            <td><a href="{{url('/manager/room/approve/'.$room->id)}}"><span class="glyphicon glyphicon-ok "></span> Approve</a></td>
                            @endif
                                <td><a href="{{url('/roomDetails/'.$room->id)}}">Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


    </div>
    @else
        <br/>
        <br/>
        <div class="alert alert-info">
            <center><h1>No Pending Rooms Found !!</h1></center>
        </div>
        @endif
        </div>
        <br/>

















@endsection

@section('scripts')

@endsection