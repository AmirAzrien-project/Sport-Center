@extends('layouts.app')

@section('content')

<head>
    <style>
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
    </style>
</head>

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

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-secondary">Booking Details</h2>
            <div>
                <a class="btn btn-secondary" href="{{ route('bookings.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Update Booking') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('bookings.update',$booking->user_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <!--<input id="name" type="text" class="form-control" name="name" value="{{ $booking->name }}" required autofocus>-->
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="form-group">
                    <label for="court">Court</label>
                    <select name="court" id="court" class="form-control" required>
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
                    <label for="booking_date">Date:</label>
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
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection