<?php

namespace App\Http\Controllers;

use App\Models\ParkingSlot;
use Illuminate\Http\Request;

class ParkingSlotController extends Controller
{
    public function index()
    {
        $slots = ParkingSlot::all();
        return view('slots.index', compact('slots'));
    }

    public function create()
    {
        return view('slots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slot_number' => 'required|unique:parking_slots',
            'is_available' => 'required|boolean',
        ]);

        ParkingSlot::create($request->all());
        return redirect()->route('slots.index')->with('success', 'Slot created.');
    }

    public function edit(ParkingSlot $slot)
    {
        return view('slots.edit', compact('slot'));
    }

    public function update(Request $request, ParkingSlot $slot)
    {
        $request->validate([
            'slot_number' => 'required|unique:parking_slots,slot_number,' . $slot->id,
            'is_available' => 'required|boolean',
        ]);

        $slot->update($request->all());
        return redirect()->route('slots.index')->with('success', 'Slot updated.');
    }

    public function destroy(ParkingSlot $slot)
    {
        $slot->delete();
        return redirect()->route('slots.index')->with('success', 'Slot deleted.');
    }
}