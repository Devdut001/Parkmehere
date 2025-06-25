<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingSlot;
use App\Models\Vehicle;
use App\Models\ParkingSession;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSlots = ParkingSlot::count();
        $availableSlots = ParkingSlot::where('is_available', true)->count();
        $occupiedSlots = $totalSlots - $availableSlots;

        $totalVehicles = Vehicle::count();
        $activeSessions = ParkingSession::whereNull('exit_time')->count();

        return view('dashboard', compact(
            'totalSlots',
            'availableSlots',
            'occupiedSlots',
            'totalVehicles',
            'activeSessions'
        ));
    }
}