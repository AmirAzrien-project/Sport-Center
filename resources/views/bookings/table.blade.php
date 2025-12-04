@extends('layouts.app')

@section('content')

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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

        .search-bar {
            margin-bottom: 20px;
        }

        .accordion .card-header {
            cursor: pointer;
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
                <a class="btn btn-primary" href="{{ route('bookings.create') }}"> Add</a>
            </div>
        </div>
    </div>
    <div class="search-bar">
        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if (Auth::user()->role === 'admin')
    <h3 class="text-secondary">Pending Bookings</h3>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Court</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                        <th>Pay Here</th>
                        @if (Auth::user()->role === 'admin')
                        <th>Approval</th>
                        @endif
                    </tr>
                </thead>
                <tbody id="pendingBookingsTable">
                    @foreach ($pendingBookings as $booking)
                    <tr>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->court }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                        <td>{{ $booking->approval }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->start_booking_time)->format('h:i A') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->end_booking_time)->format('h:i A') }}</td>
                        <td>
                            <form action="{{ route('bookings.destroy', ['id' => $booking->user_id]) }}" method="POST">
                                <a class="btn btn-primary {{ \Carbon\Carbon::parse($booking->start_booking_time)->format('H:i') == '09:25' ? 'disabled' : '' }}" href="{{ route('bookings.edit', $booking->user_id) }}">Update</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a class="nav-link" href="https://wa.link/t2cqir" target="_blank">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </td>
                        @if (Auth::user()->role === 'admin')
                        <td>
                            <div class="d-inline-block">
                                <form action="{{ route('bookings.approve', $booking->user_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="approval" value="approved">
                                    <button type="submit" class="btn btn-success" title="Approve Booking">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="d-inline-block ml-2">
                                <form action="{{ route('bookings.approve', $booking->user_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="approval" value="declined">
                                    <button type="submit" class="btn btn-danger" title="Decline Booking">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <h3 class="text-secondary mt-5">All Bookings</h3>
    <div class="accordion" id="accordionExample">
        @foreach ($bookings as $email => $userBookings)
        <div class="card">
            <div class="card-header" id="heading{{ $loop->index }}">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
                        {{ $email }}
                    </button>
                </h2>
            </div>

            <div id="collapse{{ $loop->index }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $loop->index }}" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Court</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                                <th>Pay Here</th>
                                @if (Auth::user()->role === 'admin')
                                <th>Approval</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="booking-table">
                            @foreach ($userBookings as $booking)
                            <tr>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->court }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                                <td>{{ $booking->approval }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->start_booking_time)->format('h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->end_booking_time)->format('h:i A') }}</td>
                                <td>
                                    <form action="{{ route('bookings.destroy', $booking->user_id) }}" method="POST">
                                        @if (Auth::user()->role === 'admin')
                                        <a class="btn btn-primary" href="{{ route('bookings.edit', $booking->user_id) }}">Update</a>
                                        @endif
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a class="nav-link" href="https://wa.link/t2cqir" target="_blank">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                </td>
                                @if (Auth::user()->role === 'admin')
                                <td>
                                    <div class="d-inline-block">
                                        <form action="{{ route('bookings.approve', $booking->user_id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="approval" value="approved">
                                            <button type="submit" class="btn btn-success" title="Approve Booking">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <form action="{{ route('bookings.approve', $booking->user_id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="approval" value="declined">
                                            <button type="submit" class="btn btn-danger" title="Decline Booking">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var filter = this.value.toLowerCase();
        var rows = document.querySelectorAll('tbody.booking-table tr');

        rows.forEach(function(row) {
            var name = row.cells[0].textContent.toLowerCase();
            var court = row.cells[1].textContent.toLowerCase();
            var date = row.cells[2].textContent.toLowerCase();

            if (name.includes(filter) || court.includes(filter) || date.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        var pendingRows = document.querySelectorAll('#pendingBookingsTable tr');

        pendingRows.forEach(function(row) {
            var name = row.cells[0].textContent.toLowerCase();
            var court = row.cells[1].textContent.toLowerCase();
            var date = row.cells[2].textContent.toLowerCase();

            if (name.includes(filter) || court.includes(filter) || date.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const pendingBookingsTable = document.getElementById('pendingBookingsTable');
        const allBookingsTables = document.querySelectorAll('.booking-table');

        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();

            // Filter Pending Bookings
            filterTable(pendingBookingsTable, filter);

            // Filter All Bookings
            allBookingsTables.forEach(table => {
                filterTable(table, filter);
            });
        });

        function filterTable(table, filter) {
            const rows = table.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const txtValue = cells[j].textContent || cells[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                if (found) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    });
</script>

@endsection