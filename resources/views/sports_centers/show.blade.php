@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Court</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #000000;
        }

        .navbar-nav .nav-link {
            color: #666666;
        }

        .container {
            margin-top: 50px;
        }

        .flip-container {
            perspective: 1000px;
            margin-bottom: 20px;
        }

        .flip-container,
        .front,
        .back {
            width: 100%;
            height: 100%;
        }

        .flipper {
            transition: 0.6s;
            transform-style: preserve-3d;
            position: relative;
        }

        .front,
        .back {
            backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 8px;
            overflow: hidden;
        }

        .front {
            z-index: 2;
            transform: rotateY(0deg);
        }

        .back {
            transform: rotateY(180deg);
            background-color: #ffffff;
            padding: 20px;
            box-sizing: border-box;
        }

        .court-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ced4da;
            /* Add a solid border */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Add a subtle box shadow */
        }

        .description {
            padding: 15px;
            color: #333333;
        }

        .back h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333333;
        }

        .back p {
            color: #666666;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Sport Centre Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sports_centers.index') }}">Court</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookings.index') }}">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile Page</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                {{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex flex-wrap justify-content-around">
            <div class="flip-container col-md-4">
                <div class="flipper">
                    <div class="front"> <a href="booking.php?court=futsal" class="court-item"> <img src="../booking_system/images/futsalcourt.jpg" alt="Futsal Court">
                            <div class="description">
                                <h3>Futsal Court</h3>
                            </div>
                        </a> </div>
                    <div class="back">
                        <h3>Futsal Court</h3>
                        <p>Book the best futsal court in town for your next game. Perfect for all skill levels and available for both casual and competitive matches.</p>
                    </div>
                </div>
            </div>
            <div class="flip-container col-md-4">
                <div class="flipper">
                    <div class="front"> <a href="booking.php?court=football" class="court-item"> <img src="../images/footballpitch.jpg" alt="Football Pitch">
                            <div class="description">
                                <h3>Football Pitch</h3>
                            </div>
                        </a> </div>
                    <div class="back">
                        <h3>Football Pitch</h3>
                        <p>Our football pitch is available for booking all year round. Ideal for team practices, tournaments, and friendly matches.</p>
                    </div>
                </div>
            </div>
            <div class="flip-container col-md-4">
                <div class="flipper">
                    <div class="front"> <a href="booking.php?court=pool" class="court-item"> <img src="../images/pool.jpg" alt="Swimming Pool">
                            <div class="description">
                                <h3>Swimming Pool</h3>
                            </div>
                        </a> </div>
                    <div class="back">
                        <h3>Swimming Pool</h3>
                        <p>Enjoy our heated swimming pool for leisure, fitness, and competitions. Book your slot today and dive in!</p>
                    </div>
                </div>
            </div>
            <div class="flip-container col-md-4">
                <div class="flipper">
                    <div class="front"> <a href="booking.php?court=badminton" class="court-item"> <img src="../images/badminton.jpg" alt="Badminton Court">
                            <div class="description">
                                <h3>Badminton Court</h3>
                            </div>
                        </a> </div>
                    <div class="back">
                        <h3>Badminton Court</h3>
                        <p>Our badminton courts are perfect for players of all levels. Reserve your spot for practice sessions or tournaments.</p>
                    </div>
                </div>
            </div>
            <div class="flip-container col-md-4">
                <div class="flipper">
                    <div class="front"> <a href="booking.php?court=track" class="court-item"> <img src="../images/tracknfield.jpg" alt="Track & Field">
                            <div class="description">
                                <h3>Track & Field</h3>
                            </div>
                        </a> </div>
                    <div class="back">
                        <h3>Track & Field</h3>
                        <p>Our track and field facilities are available for athletes of all ages. Book your time slot for training or events.</p>
                    </div>
                </div>
            </div>
            <div class="flip-container col-md-4">
                <div class="flipper">
                    <div class="front"> <a href="booking.php?court=tennis" class="court-item"> <img src="../images/tenniscourt.jpg" alt="Tennis Court">
                            <div class="description">
                                <h3>Tennis Court</h3>
                            </div>
                        </a> </div>
                    <div class="back">
                        <h3>Tennis Court</h3>
                        <p>Our tennis courts are well-maintained and ready for play. Book your court for a session with friends or a competitive match.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection