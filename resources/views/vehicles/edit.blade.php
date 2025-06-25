@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Vehicle</h1>
    <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
        @csrf
        @method('PUT')

        <label class="block mb-2">Owner Name:</label>
        <input type="text" name="owner_name" value="{{ $vehicle->owner_name }}" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">License Plate:</label>
        <input type="text" name="license_plate" value="{{ $vehicle->license_plate }}" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Vehicle Type:</label>
        <input type="text" name="vehicle_type" value="{{ $vehicle->vehicle_type }}" class="w-full border p-2 mb-4" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection