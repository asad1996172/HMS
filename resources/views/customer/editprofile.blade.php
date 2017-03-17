@extends('layouts.app')

@section('head')
    <title>Edit Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>

    <link href="css/form.css" rel="stylesheet">
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
            margin-top: 120px;
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
                    <h1 class="logo">Profile
                        <small></small>
                    </h1>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Profile </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-12" style="min-height:170px">
                                <form class="form-horizontal" role="form" method="POST" id="update" enctype="multipart/form-data" action="{{ url('/update')}}">
                                    {{ csrf_field() }}

                                    <center>
                                        <img src="images/{{Auth::user()->path}}"
                                             style="width: 150px ;height: 150px ; border-radius: 50% ;background-color:#ff0;border:2px solid #72a0ff">

                                    </center>
                                    <br/>
                                    <input id="photo" type="file" class="form-control" name="photo"  >
                                    <br/>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   placeholder="Enter Full Name"
                                                   value="{{Auth::user()->name}}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="email" placeholder="Enter Email Address" disabled type="email"
                                                   class="form-control" name="email"
                                                   value="{{Auth::user()->email}}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                    class="btn btn-primary btn-sm pull-right form-control input-md">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="js/reg.js"></script>

@endsection