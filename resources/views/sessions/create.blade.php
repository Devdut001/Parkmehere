@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">New Parking Session</h1>
    <form method="POST" action="{{ route('sessions.store') }}">
        @csrf
        <label class="block mb-2">Vehicle:</label>
        <select name="vehicle_id" class="w-full border p-2 mb-4">
            @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->license_plate }} ({{ $vehicle->owner_name }})</option>
            @endforeach
        </select>

        <label class="block mb-2">Parking Slot:</label>
        <select name="parking_slot_id" class="w-full border p-2 mb-4">
            @foreach($slots as $slot)
                <option value="{{ $slot->id }}">{{ $slot->slot_number }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Start Session</button>
    </form>
</div>
@endsection