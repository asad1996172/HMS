@extends('layouts.app')

@section('head')

    <title>HMS Hotel Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <script src="js/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet">
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

@if(Auth::check())
@if(Auth::user()->name == 'Admin' || Auth::user()->name == 'Manager')
@section('content')

    <div class="container">

        <div class="page-header">
            <h1>Details</h1>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default" style="height: 130px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Users</h3>
                    </div>
                    <div class="panel-body">
                        {{$data['users']}}
                    </div>
                </div>
                <div class="panel panel-primary" style="height: 130px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Rooms</h3>
                    </div>
                    <div class="panel-body">
                        {{$data['rooms']}}
                    </div>
                </div>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-6">
                <div class="panel panel-success" style="height: 130px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Bookings</h3>
                    </div>
                    <div class="panel-body">
                        {{$data['bookings']}}
                    </div>
                </div>
                <div class="panel panel-info" style="height: 130px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Approval Pending Rooms</h3>
                    </div>
                    <div class="panel-body">
                        {{$data['pending']}}
                    </div>
                </div>
            </div>
            <!-- /.col-sm-4 -->


            <!-- /.col-sm-4 -->
        </div>
    </div><br/>
    <br/>
    <br/>
    <br/>
    <br/>

    @endsection
    @else
@section('content')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/1.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>Class</h3>
                    <p></p>
                </div>
            </div>

            <div class="item">
                <img src="images/2.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>Quality</h3>
                    <p></p>
                </div>
            </div>
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
    <div style="background-color:#000000;height:10px">
    </div>
    <div class="container text-center">
        <h2 class="thick">What We Offer</h2><br>
        <div class="row">
            <div class="col-lg-4 boxhead">
                <a href="{{url('/single')}}">
                    <div class="card">
                        <img src="images/single.jpg" class="img-responsive" style="width:100%" alt="Image"><br/>
                        <p>Single Rooms</p>
                    </div></a>
            </div>
            </a>
            <div class="col-lg-4 boxhead">
                <a href="{{url('/double')}}">
                    <div class="card">
                        <img src="images/double.jpg" class="img-responsive" style="width:100%" alt="Image"><br/>
                        <p>Double Rooms</p>
                    </div></a>
            </div>
            </a>
            <div class="col-lg-4 boxhead">
                <a href="{{url('/suite')}}">
                    <div class="card">
                        <img src="images/suites.jpg" class="img-responsive" style="width:100%" alt="Image"><br/>
                        <p>Suites</p>
                    </div></a>
            </div>
            </a>
        </div>
    </div><br>

@endsection
@endif
@else

@section('content')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/1.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>Class</h3>
                    <p></p>
                </div>
            </div>

            <div class="item">
                <img src="images/2.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>Quality</h3>
                    <p></p>
                </div>
            </div>
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
    <div style="background-color:#000000;height:10px">
    </div>
    <div class="container text-center">
        <h2 class="thick">What We Offer</h2><br>
        <div class="row">
            <div class="col-lg-4 boxhead">
                <a href="{{url('/single')}}">
                    <div class="card">
                        <img src="images/single.jpg" class="img-responsive" style="width:100%" alt="Image"><br/>
                        <p>Single Rooms</p>
                    </div></a>
            </div>
            </a>
            <div class="col-lg-4 boxhead">
                <a href="{{url('/double')}}">
                    <div class="card">
                        <img src="images/double.jpg" class="img-responsive" style="width:100%" alt="Image"><br/>
                        <p>Double Rooms</p>
                    </div></a>
            </div>
            </a>
            <div class="col-lg-4 boxhead">
                <a href="{{url('/suite')}}">
                    <div class="card">
                        <img src="images/suites.jpg" class="img-responsive" style="width:100%" alt="Image"><br/>
                        <p>Suites</p>
                    </div></a>
            </div>
            </a>
        </div>
    </div><br>

@endsection
@endif
@section('scripts')

@endsection