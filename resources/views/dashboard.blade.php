@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Parking System Dashboard</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-blue-100 p-6 rounded-xl shadow-md text-center">
            <h2 class="text-lg font-semibold mb-2">Total Parking Slots</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $totalSlots }}</p>
        </div>

        <div class="bg-green-100 p-6 rounded-xl shadow-md text-center">
            <h2 class="text-lg font-semibold mb-2">Available Slots</h2>
            <p class="text-3xl font-bold text-green-600">{{ $availableSlots }}</p>
        </div>

        <div class="bg-red-100 p-6 rounded-xl shadow-md text-center">
            <h2 class="text-lg font-semibold mb-2">Occupied Slots</h2>
            <p class="text-3xl font-bold text-red-600">{{ $occupiedSlots }}</p>
        </div>

        <div class="bg-yellow-100 p-6 rounded-xl shadow-md text-center">
            <h2 class="text-lg font-semibold mb-2">Registered Vehicles</h2>
            <p class="text-3xl font-bold text-yellow-600">{{ $totalVehicles }}</p>
        </div>

        <div class="bg-purple-100 p-6 rounded-xl shadow-md text-center">
            <h2 class="text-lg font-semibold mb-2">Active Sessions</h2>
            <p class="text-3xl font-bold text-purple-600">{{ $activeSessions }}</p>
        </div>
    </div>
</div>
@endsection