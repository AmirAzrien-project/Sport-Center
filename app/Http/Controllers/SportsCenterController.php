<?php

namespace App\Http\Controllers;

use App\Models\SportsCenter;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\SportsCenter;
use Illuminate\Http\Request;

class SportsCenterController extends Controller
{
    // Show a list of sports centers
    public function index()
    {
        $sports_centers = SportsCenter::all(); // Fetch all sports centers from the database
        return view('sports_centers.index', compact('sports_centers'));
    }

    // Show a specific sports center
    public function show($id)
    {
        $sport_center = SportsCenter::findOrFail($id); // Fetch a single sports center by ID
        return view('sports_centers.show', compact('sport_center'));
    }
}
