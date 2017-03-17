@extends('layouts.app')

@section('head')
    <title>Sign Up</title>
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
                    <h1 class="logo">SignUp
                        <small>Happy Hotelling !!</small>
                    </h1>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">SignUp User </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-12" style="min-height:250px">
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/register') }}">
                                    {{ csrf_field() }}

                                    <center>
                                        <img src="images/avatar04.png"
                                             style="width: 150px ;height: 150px ; border-radius: 50% ;background-color:#ff0;border:2px solid #72a0ff">

                                    </center>
                                    <br/>

                                    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="photo" type="file" class="form-control" name="photo"
                                                   value="{{ old('photo') }}"  autofocus>

                                            @if ($errors->has('photo'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="check_the_name" onchange="checkname()" type="text" class="form-control" name="name"
                                                   placeholder="Enter Full Name"
                                                   value="{{ old('name') }}" required autofocus>
                                            <span  class="help-block">
                                        <strong id="error_in_name" style="color: #bc1103;"></strong>
                                    </span>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="emailaddress" onchange="checkEmail()" placeholder="Enter Email Address" type="email"
                                                   class="form-control" name="email"
                                                   value="{{ old('email') }}" required>
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
                                            <input id="check_Password" onchange="checkPass()" type="password" class="form-control"
                                                   placeholder="Enter Password" name="password" required>
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
                                            <input id="check_password-confirm" onchange="checkconfirm()" type="password" class="form-control"
                                                   placeholder="Confirm Password"
                                                   name="password_confirmation" required>
                                            <span  class="help-block">
                                        <strong id="error_in_confirm" style="color: #bc1103;"></strong>
                                    </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                    class="btn btn-primary btn-sm pull-right form-control input-md">
                                                Register
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

        function checkEmail() {

            var check = document.getElementById('emailaddress').value.match(/[!$ %^&*()+|~=`{}\[\]:";',<>?\/]/);
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
                span.appendChild( document.createTextNode("Email Address cannot have !$ %^&*()+|~=`,{}\':\"<>\/?\\"));

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

        function checkconfirm() {
            var check = document.getElementById('check_Password').value;
            var confirm = document.getElementById('check_password-confirm').value;
            if (check  == confirm ) {
                document.getElementById("check_password-confirm").style.borderColor = '#006314';
                var span = document.getElementById('error_in_confirm');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode(""));
            }
            else {
                var span = document.getElementById('error_in_confirm');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode("Passwords donot match "));
                document.getElementById("check_password-confirm").style.borderColor = '#FF0013';
                document.getElementById("check_Password").style.borderColor = '#FF0013';
                document.getElementById("check_Password").value = null;
                document.getElementById('check_password-confirm').value = null;
            }
        }


        function checkname() {
            var check = document.getElementById('check_the_name').value.match(/[0-9-!$%^&*_()+|~=`{}\[\]:";'<>?,.\/]/);
            if (check == null) {
                document.getElementById("check_the_name").style.borderColor = '#006314';
                var span = document.getElementById('error_in_name');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode(""));
            }
            else {
                var span = document.getElementById('error_in_name');

                while( span.firstChild ) {
                    span.removeChild( span.firstChild );
                }
                span.appendChild( document.createTextNode("Name cannot have !$ %^&*()+|~=`{}\':\"<>\/?\\.,0123456789"));
                document.getElementById("check_the_name").style.borderColor = '#FF0013';
                document.getElementById("check_the_name").value = null;
            }
        }

    </script>
@endsection