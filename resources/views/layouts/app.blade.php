<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Center Booking System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sport_center.css') }}">

<style>
    
</style>

</head>

<body>
    <!--<div class="sidebar">
        <h2>Sports Center</h2>
        <a href="{{ route('home.index') }}">Home</a>
        <a href="{{ route('sports_centers.index') }}">Sports Center</a>
        <a href="{{ route('bookings.index') }}">Bookings</a>
    </div>

    <div class="main-content">
        <div class="navbar">
            <a href="{{ url('/') }}">Home</a>
            <div>
                @if(Auth::check())
                <span>{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @endif
            </div>
        </div>-->

    <div class="content">
        @yield('content')
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>