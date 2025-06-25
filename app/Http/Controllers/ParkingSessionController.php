<?php

namespace App\Http\Controllers;

use App\Models\ParkingSession;
use App\Models\Vehicle;
use App\Models\ParkingSlot;
use Illuminate\Http\Request;

class ParkingSessionController extends Controller
{
    public function index()
    {
        $sessions = ParkingSession::with(['vehicle', 'parkingSlot'])->get();
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        $slots = ParkingSlot::where('is_available', true)->get();
        return view('sessions.create', compact('vehicles', 'slots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'parking_slot_id' => 'required|exists:parking_slots,id',
        ]);

        $session = ParkingSession::create([
            'vehicle_id' => $request->vehicle_id,
            'parking_slot_id' => $request->parking_slot_id,
            'entry_time' => now(),
        ]);

        // Mark slot as occupied
        $slot = ParkingSlot::find($request->parking_slot_id);
        $slot->is_available = false;
        $slot->save();

        return redirect()->route('sessions.index')->with('success', 'Session started.');
    }

    public function edit(ParkingSession $session)
    {
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, ParkingSession $session)
    {
        $session->exit_time = now();
        $session->save();

        // Mark slot as available
        $slot = $session->parkingSlot;
        $slot->is_available = true;
        $slot->save();

        return redirect()->route('sessions.index')->with('success', 'Session ended.');
    }

    public function destroy(ParkingSession $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Session deleted.');
    }
}