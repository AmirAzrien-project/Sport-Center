<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingStatus extends Controller
{
    const PENDING = 'Pending';
    const CONFIRMED = 'Confirmed';
    const CANCELLED = 'Cancelled';
}
