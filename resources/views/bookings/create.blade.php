@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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


        .booking-section {
            margin-top: 15px;
            background-color: #ffffff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .booking-section h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333333;
        }

        .form-group label {
            color: #666666;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
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
        <div class="booking-section">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sports_centers.index') }}"> Back</a>
            </div>
            <br>
            <h2>Booking</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label for="court">Court</label>
                    <select name="court" id="court" class="form-control" required>time_sleep_until
                        <option value="" selected disabled>Please Choose</option>
                        <option value="Futsal Court">Futsal Court</option>
                        <option value="Football Pitch">Football Pitch</option>
                        <option value="Swimming Pool">Swimming Pool</option>
                        <option value="Badminton Court">Badminton Court</option>
                        <option value="Track & Field">Track & Field</option>
                        <option value="Tennis Court">Tennis Court</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="booking_date" name="booking_date" required>
                </div>
                <div class="form-group">
                    <label for="start_booking_time">Start Booking Time:</label>
                    <input type="time" class="form-control" id="start_booking_time" name="start_booking_time" required>
                    @error('start_booking_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="end_booking_time">End Booking Time:</label>
                    <input type="time" class="form-control" id="end_booking_time" name="end_booking_time" required>
                    @error('end_booking_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
@endsection