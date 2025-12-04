@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

        .about-section {
            text-align: center;
            padding: 50px 0;
        }

        .about-section h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #333333;
        }

        .about-section p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #666666;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .team-section {
            background-color: #ffffff;
            padding: 50px 0;
        }

        .team-section h2 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #333333;
            text-align: center;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .team-member h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333333;
        }

        .team-member p {
            font-size: 16px;
            color: #666666;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 50px 0;
            text-align: center;
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

    <section class="about-section">
        <div class="container">
            <h1>About Us</h1>
            <p>Welcome to the Sport Centre Management System. We are dedicated to providing the best facilities and services to ensure that your sports experience is outstanding. Our state-of-the-art facilities include futsal courts, football pitches, swimming pools, badminton courts, track & field, and tennis courts. Our mission is to promote healthy and active lifestyles through sports and recreation.</p>
        </div>
    </section>

    <section class="team-section">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="row">
                <div class="col-md-3 team-member">
                    <img src="../images/mal.jpg" alt="Team Member 1">
                    <h3>Sir Asrol</h3>
                    <p>CEO & Founder</p>
                </div>
                <div class="col-md-3 team-member">
                    <img src="../images/iqmal.jpg" alt="Team Member 2">
                    <h3>Iqmal Reza</h3>
                    <p>Chief Operating Officer</p>
                </div>
                <div class="col-md-3 team-member">
                    <img src="../images/amir.jpg" alt="Team Member 3">
                    <h3>Amir Azrien</h3>
                    <p>Head of Facilities</p>
                </div>
                <div class="col-md-3 team-member">
                    <img src="../images/daus.jpg" alt="Team Member 3">
                    <h3>Daus Dunya</h3>
                    <p>Intern</p>
                </div>
            </div>
        </div>
    </section>
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