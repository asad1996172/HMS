<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
    <script>
        window.Laravel  <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">HMS</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/rooms') }}">Rooms</a></li>
                @if(Auth::check())
                    @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'Manager')
                    @else
                        <li><a href="{{ url('/aboutUs') }}">About</a></li>
                        <li><a href="{{ url('/contactUs') }}">Contact</a></li>
                    @endif
                @else
                    <li><a href="{{ url('/aboutUs') }}">About</a></li>
                    <li><a href="{{ url('/contactUs') }}">Contact</a></li>
                @endif
                @if (Auth::check() )
                    @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'Manager')
                        <li><a href="{{ url('/pendingRooms') }}">Pending Rooms</a></li>
                        @else
                        <li><a href="{{ url('/bookings') }}">Booked Rooms</a></li>
                        @endif

                @endif

                @if(Auth::check())
                    @if(Auth::user()->name == 'Admin')
                        <li><a href="{{ url('/admin/add_room') }}">Add Room</a></li>
                    @endif
                    @endif

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li>
                        <img src="{{ URL::asset('images/'.Auth::user()->path ) }}"
                             style="margin: 5px;width: 40px ;height: 40px ; border-radius: 50% ">
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li>

                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out"></span> Logout
                                </a>

                                @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'Manager')
                                @else
                                    <a href="{{ url('/profile') }}">
                                        <span class="glyphicon glyphicon-user"></span> Profile
                                    </a>
                                    <a href="{{ url('/changePassword') }}">
                                        <span class="glyphicon glyphicon-edit"></span> Change Password
                                    </a>
                                @endif
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


@yield('content')


<footer class="container-fluid text-center">
    <h4>Developed by HY Sites</h4>
</footer>


<!-- Scripts -->
@yield('scripts')
<script src="/js/app.js"></script>
</body>
</html>
