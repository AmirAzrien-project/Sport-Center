<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    public function paypal(Request $request)
    {
        // Validate the booking data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'court' => 'required|string|max:255',
            'booking_date' => 'required|date',
            'start_booking_time' => 'required|date_format:H:i|after:08:00',
            'end_booking_time' => 'required|date_format:H:i|before:18:00|after:start_booking_time',
        ]);
        
        $startTime = strtotime($request->start_booking_time);
        $endTime = strtotime($request->end_booking_time);

        // Define the start and end times for the allowed booking range
        $allowedStartTime = strtotime('08:00');
        $allowedEndTime = strtotime('18:00');

        // Check if the start and end times are within the allowed range
        if ($startTime < $allowedStartTime || $endTime > $allowedEndTime) {
            return redirect()->back()->withInput()->withErrors(['booking_time' => 'Booking time must be between 8:00 AM and 6:00 PM.']);
        }

        // Temporarily store booking data in session
        $bookingData = $request->all();
        $request->session()->put('bookingData', $bookingData);

        // Proceed with PayPal payment
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]     
        ]);
        dd($response);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal.cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Retrieve booking data from session
            $bookingData = $request->session()->get('bookingData');

            // Create the booking
            Booking::create($bookingData);

            // Clear the booking data from session
            $request->session()->forget('bookingData');

            return redirect()->route('bookings.index')->with('success', 'Payment successful. Booking confirmed.');
        } else {
            return redirect()->route('paypal.cancel');
        }
    }

    public function cancel(Request $request)
    {
        // Clear the booking data from session
        $request->session()->forget('bookingData');

        // Handle payment cancellation
        return redirect()->route('bookings.index')->with('error', 'Payment was cancelled. Booking not created.');
    }
}
