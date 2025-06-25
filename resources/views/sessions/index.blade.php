@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Parking Sessions</h1>
    <a href="{{ route('sessions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">New Session</a>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Vehicle</th>
                <th class="p-2 border">Slot</th>
                <th class="p-2 border">Entry</th>
                <th class="p-2 border">Exit</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sessions as $session)
            <tr>
                <td class="p-2 border">{{ $session->vehicle->license_plate }}</td>
                <td class="p-2 border">{{ $session->parkingSlot->slot_number }}</td>
                <td class="p-2 border">{{ $session->entry_time }}</td>
                <td class="p-2 border">{{ $session->exit_time ?? 'Still Parked' }}</td>
                <td class="p-2 border">
                    <a href="{{ route('sessions.edit', $session->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
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