<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\SportsCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TelegramService;

class BookingController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            // If user is admin, get all bookings and pending bookings
            $bookings = Booking::all()->groupBy('email');
            $pendingBookings = Booking::where('approval', 'pending')->get();
            $totalBookingsCount = Booking::count();
            $totalPendingBookingsCount = Booking::where('approval', 'pending')->count();
        } else {
            // If user is not admin, get only their bookings and their pending bookings
            $userEmail = Auth::user()->email;
            $bookings = Booking::with('user')->where('email', $userEmail)->get()->groupBy('email');
            $pendingBookings = Booking::with('user')->where('email', $userEmail)->where('approval', 'pending')->get();
            $totalBookingsCount = Booking::where('email', $userEmail)->count();
            $totalPendingBookingsCount = Booking::where('email', $userEmail)->where('approval', 'pending')->count();
        }
    
        return view('bookings.index', compact('bookings', 'pendingBookings', 'totalBookingsCount', 'totalPendingBookingsCount'));
    }
    

    public function create()
    {
        //$booking = new Booking();
        //return view('bookings.create', compact('booking'));
        $bookings = Booking::all();
        return view('bookings.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        /**$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'court' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after:08:00',
            'end_time' => 'required|date_format:H:i|before:18:00|after:start_time',
        ]);*/

        $startTime = strtotime($request->start_booking_time);
        $endTime = strtotime($request->end_booking_time);

        // Define the start and end times for the allowed booking range
        $allowedStartTime = strtotime('08:00');
        $allowedEndTime = strtotime('18:00');

        // Check if the start and end times are within the allowed range
        if ($startTime < $allowedStartTime || $endTime > $allowedEndTime) {
            return redirect()->back()->withInput()->withErrors(['booking_time' => 'Booking time must be between 8:00 AM and 6:00 PM.']);
        }

        // If validation passes, create the booking
        Booking::create($request->all());
        

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('bookings'));
    }

    // Method to edit a specific booking
    public function edit(Booking $booking)
    {
        $bookings = Booking::pluck('name', 'user_id');

        return view('bookings.edit', compact('booking', 'bookings'));
    }

    // Method to delete a specific booking
    public function destroy(Booking $booking)
    {
        // Delete the booking
        $booking->delete();

        // Redirect back to the bookings index page with success message
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully');
    }

    public function update(Request $request, $id)
    {
        /**$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'court' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after:08:00',
            'end_time' => 'required|date_format:H:i|before:18:00|after:start_time',
        ]);*/

        $startTime = strtotime($request->start_booking_time);
        $endTime = strtotime($request->end_booking_time);

        // Define the start and end times for the allowed booking range
        $allowedStartTime = strtotime('08:00');
        $allowedEndTime = strtotime('18:00');

        // Check if the start and end times are within the allowed range
        if ($startTime < $allowedStartTime || $endTime > $allowedEndTime) {
            return redirect()->back()->withInput()->withErrors(['booking_time' => 'Booking time must be between 8:00 AM and 6:00 PM.']);
        }

        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the booking with validated data
        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }


    public function approve(Request $request, Booking $booking)
    {
        // Check if approval status is provided in the request
        if ($request->has('approval')) {
            // Update the approval status of the booking
            $booking->approval = $request->approval;

            // Save the updated booking record
            $booking->save();

            return redirect()->back()->with('success', 'Booking status updated successfully');
        } else {
            // If approval status is not provided, return with an error
            return redirect()->back()->with('error', 'Approval status not provided');
        }
    }
}