@extends('layouts.app')
@section('head')
    <title>Contact US</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
            font-size: 20px;
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
                <h1 class="page-header">Contact US

                </h1>

            </div>
        </div>

        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h2>Contact Details</h2>
                <p>
                    Fast NU<br>Johar Town , Lahore<br>
                </p>
                <p><i class="fa fa-phone"></i>
                    Phone : (123) 456-7890</p>
                <p><i class="fa fa-envelope-o"></i>
                    Email : <a href="#">fastnu@lhrcampus.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i>
                    Hours : Monday - Friday: 7:00 AM to 9:00 PM</p>

            </div>
        </div>
    </div>
    <!-- /.row -->
    <br/>
@endsection
@section('scripts')
@endsection