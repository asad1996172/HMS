@extends('layouts.app')

@section('head')

    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <link href="{{ URL::asset('css/form.css') }}" rel="stylesheet">
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
    <div class="body_login">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="middlePage">
                <div class="page-header">
                    <h1 class="logo">LogIn
                        <small>Happy Hotelling !!</small>
                    </h1>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">LogIn User </h3>
                    </div>
                    <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}


                        @if($message = Session::get('Success'))

                            <div class="alert alert-success">

                                <p>
                                    {{$message}}
                                </p>
                            </div>

                        @endif
                        @if($message = Session::get('Failure'))

                            <div class="alert alert-danger">

                                <p>
                                    {{$message}}
                                </p>
                            </div>

                        @endif
                        @if($message = Session::get('Warning'))

                            <div class="alert alert-warning">

                                <p>
                                    {{$message}}
                                </p>
                            </div>

                        @endif

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                <div class="col-md-12">
                                    <input id="emailaddress" type="email" onchange="checkEmail()"  class="form-control input-md" name="email" placeholder="Enter Email Address"
                                           value="{{ old('email') }}" required autofocus>

                                    <span  class="help-block">
                                        <strong id="error_in_email" style="color: #bc1103;"></strong>
                                    </span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <input id="check_Password" onchange="checkPass()"  type="password" class="form-control input-md" placeholder="Password" name="password" required>
                                    <span  class="help-block">
                                        <strong id="error_in_password" style="color: #bc1103;"></strong>
                                    </span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm pull-right form-control input-md">
                                        Login
                                    </button>

                                    <center><a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            Forgot Your Password?
                                        </a></center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <br/>

    {{--<!-- Modal -->--}}
    {{--<div class="modal fade" id="myModal" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title">Recover Password</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="container">--}}

                        {{--<form id="recover" action="config.php?action=login&module=Rider" method="post">--}}
                            {{--<fieldset>--}}

                                {{--<input id="emailaddress" name="username_email" type="email" onchange="checkEmail()" style="width:47%"--}}
                                       {{--placeholder="Enter Email Address"--}}
                                       {{--class="form-control input-md" required>--}}
                                {{--<br/>--}}

                                {{--<button id="submit_rider" name="submit_rider" style="width:47%"--}}
                                        {{--type="submit" class="btn btn-primary btn-sm ">--}}
                                    {{--Send Password--}}
                                {{--</button>--}}


                            {{--</fieldset>--}}
                        {{--</form>--}}


                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}

                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}

@endsection

@section('scripts')

    <script>

        function checkEmail() {

            var check = document.getElementById('emailaddress').value.match(/[!$ %^&*()+|~=`{}\[\]:";'<>?\/]/);
            if (check == null) {
                document.getElementById("emailaddress").style.borderColor = '#006314';
                var span = document.getElementById('error_in_email');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode(""));
            }
            else {
                document.getElementById("emailaddress").style.borderColor = '#FF0013';
                var span = document.getElementById('error_in_email');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode("Email Address cannot have !$ %^&*()+|~=`{}\':\"<>\/?\\"));

                document.getElementById("emailaddress").value = null;
            }
        }


        function checkPass() {
            var check = document.getElementById('check_Password').value;
            if (check.length >= 6) {
                document.getElementById("check_Password").style.borderColor = '#006314';
                var span = document.getElementById('error_in_password');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode(""));
            }
            else {
                var span = document.getElementById('error_in_password');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode("The password must be at least 6 characters."));
                document.getElementById("check_Password").style.borderColor = '#FF0013';
                document.getElementById("check_Password").value = null;
            }
        }

    </script>
@endsection