@extends('layouts.app')

@section('head')
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

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


    <script>

        $(document).ready(function(){
            $('#change').on('submit', function (event) {
                event.preventDefault();
                var old = document.getElementById("old_password").innerHTML;
                var pass = document.getElementById("password").innerHTML;
                var c_pass = document.getElementById("password_confirmation").innerHTML;

//                if(name.length > 0 || password.length > 0 || phone.length > 0)
//                {
//                    $('#result').html("Fill all the fields correctly.");
//                }

                $.ajax({
                    url: '/HMS/public/updatePassword',
                    type:'POST',
                    data: new FormData(this),

                    processData: false,
                    contentType: false,
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });

            });
        });

    </script>


@endsection
@section('content')
    <div class="body_login">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="middlePage">
                <div class="page-header">
                    <h1 class="logo">Password
                        <small></small>
                    </h1>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <p id="result" style="margin-left: 3.5%;font-size: x-large;color: darkgreen"> </p>
                            <div class="col-md-12" >
                                <form class="form-horizontal" id="change" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/updatePassword') }}">
                                    {{ csrf_field() }}

                                    <input id="orignal" type="hidden" class="form-control" name="orignal" value="{{Auth::user()->password}}" required>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="old_password" type="password" class="form-control"
                                                   placeholder="Enter Old Password" name="old_password" required>

                                            @if ($errors->has('old_password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control"
                                                   placeholder="Enter New Password" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-12">
                                            <input id="password_confirmation" type="password" class="form-control"
                                                   placeholder="Confirm Password"
                                                   name="password_confirmation" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                    class="btn btn-primary btn-sm pull-right form-control input-md">
                                                Change Password
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