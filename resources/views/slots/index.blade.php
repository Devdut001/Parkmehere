@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Parking Slots</h1>
    <a href="{{ route('slots.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Slot</a>
    <table class="w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Slot Number</th>
                <th class="p-2 border">Availability</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slots as $slot)
            <tr>
                <td class="p-2 border">{{ $slot->slot_number }}</td>
                <td class="p-2 border">{{ $slot->is_available ? 'Available' : 'Occupied' }}</td>
                <td class="p-2 border">
                    <a href="{{ route('slots.edit', $slot->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('slots.destroy', $slot->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
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