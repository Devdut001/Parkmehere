@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Vehicles</h1>
    <a href="{{ route('vehicles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Vehicle</a>

    <table class="w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Owner</th>
                <th class="p-2 border">License Plate</th>
                <th class="p-2 border">Type</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td class="p-2 border">{{ $vehicle->owner_name }}</td>
                <td class="p-2 border">{{ $vehicle->license_plate }}</td>
                <td class="p-2 border">{{ ucfirst($vehicle->vehicle_type) }}</td>
                <td class="p-2 border">
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection