@extends('layouts.app')

@section('head')
    <title>About US</title>
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

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About US

                </h1>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <br/>
                <img class="img-responsive" src="images/about.jpg" alt="">
            </div>
            <div class="col-md-6">
                <h2>About HMS</h2>
                <p>Good hotel software enables its users to store information about guests, retrieve it to personalize
                    the guest experience, and on the whole, ensure the guest has a wonderful stay. </p>
                <p>At the back-end, hotel software is even more important. The front office module, point of sale,
                    accounts receivable, banquets and conferences, restaurant module, housekeeping, inventory, HR and
                    Payroll, along with a host of other modules and apps in a hotel software must work in an
                    interconnected and smooth manner.</p>
                <p>The hotel software market is full of options, and each vendor claims his software is the best.
                    However investing in the right hotel software is a complex task and most hotels spend months
                    deliberating on their investment. Unfortunately, hoteliers excel at their core skill, delivering to
                    guests a world-class hospitality experience, and sometimes get ‘talked’ into making a wrong decision
                    on the software they adopt.
                </p>
            </div>
        </div>
    </div>
    <br>

    <div class=" text-center">
        <h2>Developer</h2>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="images/asad.jpg" alt="">
                <div class="caption">
                    <h3>Asad Mahmood<br>
                        <small>Web Developer</small>
                    </h3>

                </div>
            </div>
        </div>
    </div>
    <br>


@endsection
@section('scripts')
@endsection