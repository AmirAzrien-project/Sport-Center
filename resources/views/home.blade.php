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
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f9fa;
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

        .container {
            margin-top: 4px;
        }

        .gallery-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .gallery-inner {
            display: inline-block;
            white-space: nowrap;
            animation: scroll 20s linear infinite;
        }

        .gallery-item {
            display: inline-block;
            width: 300px;
            margin-right: 20px;
            vertical-align: top;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 10s ease;
        }

        .gallery-item img {
            width: 100%;
            height: 160px;
            border-radius: 8px 8px 0 0;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item .description {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 0 0 8px 8px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 30px 0;
            text-align: center;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            90% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
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
    <br>
    <!-- Introduction Section -->
    <section class="container text-center">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Welcome to Our Website</h1>
                <p class="lead">Discover the latest products and innovations from our brand. Explore our gallery to see what's new!</p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="container">
        <div class="gallery-container">
            <div class="gallery-inner">
                <div class="gallery-item">
                    <img src="../images/futsalcourt.jpg" alt="Image 1">
                    <div class="description">
                        <h3>Futsal Court</h3>
                        <p>Description of Product 1</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="../images/footballpitch.jpg" alt="Image 2">
                    <div class="description">
                        <h3>Football Pitch</h3>
                        <p>Description of Product 2</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="../images/pool.jpg" alt="Image 3">
                    <div class="description">
                        <h3>Swimming Pool</h3>
                        <p>Description of Product 3</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="../images/badminton.jpg" alt="Image 4">
                    <div class="description">
                        <h3>Badminton Court</h3>
                        <p>Description of Product 4</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="../images/tracknfield.jpg" alt="Image 5">
                    <div class="description">
                        <h3>Track & Field</h3>
                        <p>Description of Product 5</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="../images/tenniscourt.jpg" alt="Image 6">
                    <div class="description">
                        <h3>Tennis Court</h3>
                        <p>Description of Product 6</p>
                    </div>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize dropdown
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>
@endsection