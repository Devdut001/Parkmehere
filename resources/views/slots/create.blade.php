@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add Parking Slot</h1>
    <form method="POST" action="{{ route('slots.store') }}">
        @csrf
        <label class="block mb-2">Slot Number:</label>
        <input type="text" name="slot_number" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Available:</label>
        <select name="is_available" class="w-full border p-2 mb-4">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
@endsection