@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple-inspired Website</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles inspired by Apple's website */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        h2 {
            font-weight: 300;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background-color: #333;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            border-radius: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .navbar-brand {
            font-weight: bold;
            color: #000000;
            margin-right: 20px;
        }

        .navbar-nav .nav-link {
            color: #666666;
            padding: 0 10px;
            margin-right: 10px;
        }

        .navbar-nav .nav-item:last-child .nav-link {
            margin-right: 0;
        }

        .flip-container {
            perspective: 1000px;
        }

        .flip-container,
        .front,
        .back {
            width: 100%;
            height: 300px;
            border-radius: 20px;
        }

        .flipper {
            transition: 0.6s;
            transform-style: preserve-3d;
            position: relative;
        }

        .flip-container:hover .flipper {
            transform: rotateY(180deg);
        }

        .front,
        .back {
            backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .front {
            z-index: 2;
            transform: rotateY(0deg);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .back {
            transform: rotateY(180deg);
            background-color: #ffffff;
            padding: 20px;
            box-sizing: border-box;
        }

        .court-item img {
            width: 80%;
            height: 80%;
            object-fit: cover;
            border-radius: 20px;
        }

        .back h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333333;
        }

        .back p {
            color: #666666;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 30px 0;
            text-align: center;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 4rem !important;
        }
    </style>
</head>

<body>
    <!-- Header -->
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

    <!-- Introduction Section -->

    <!-- Gallery Section -->
    <div class="container mt-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary">Manage Court Details</button>
        </div>
    </div>
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="{{ route('bookings.create') }}" class="court-item">
                    <img src="{{ asset('images/badminton.jpg') }}" alt="Badminton Court">
                    <div class="description">
                    </div>
                </a>
                <h3>Badminton Court</h3>
                <p>Our badminton courts are perfect for players of all levels. Reserve your spot for practice sessions or tournaments.</p>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('bookings.create') }}" class="court-item">
                    <img src="{{ asset('images/footballpitch.jpg') }}" alt="Football Pitch">
                    <div class="description">
                    </div>
                </a>
                <h3>Football Pitch</h3>
                <p>Our football pitch is available for booking all year round. Ideal for team practices, tournaments, and friendly matches.</p>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('bookings.create') }}" class="court-item">
                    <img src="{{ asset('images/pool.jpg') }}" alt="Football Pitch">
                    <div class="description">
                    </div>
                </a>
                <h3>Swimming Pool</h3>
                <p>Enjoy our heated swimming pool for leisure, fitness, and competitions. Book your slot today and dive in!</p>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('bookings.create') }}" class="court-item">
                    <br>
                    <img src="{{ asset('images/tenniscourt.jpg') }}" alt="Football Pitch">
                    <div class="description">
                    </div>
                </a>
                <h3>Tennis Court</h3>
                <p>Our tennis courts are well-maintained and ready for play. Book your court for a session with friends or a competitive match.</p>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('bookings.create') }}" class="court-item">
                    <br>
                    <img src="{{ asset('images/tracknfield.jpg') }}" alt="Football Pitch">
                    <div class="description">
                    </div>
                </a>
                <h3>Track & Field</h3>
                <p>Our track and field facilities are available for athletes of all ages. Book your time slot for training or events.</p>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('bookings.create') }}" class="court-item">
                    <br>
                    <img src="{{ asset('images/futsalcourt.jpg') }}" alt="Football Pitch">
                    <div class="description">
                    </div>
                </a>
                <h3>Futsal Court</h3>
                <p>Book the best futsal court in town for your next game. Perfect for all skill levels and available for both casual and competitive matches.</p>
            </div>
            <!-- Add similar anchor tags for other images -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Sport Centre Management System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap and JavaScript imports -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize dropdown
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>
@endsection