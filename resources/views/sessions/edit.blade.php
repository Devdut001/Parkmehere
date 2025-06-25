@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">End Parking Session</h1>
    <form method="POST" action="{{ route('sessions.update', $session->id) }}">
        @csrf
        @method('PUT')

        <p class="mb-4">Vehicle: {{ $session->vehicle->license_plate }}</p>
        <p class="mb-4">Slot: {{ $session->parkingSlot->slot_number }}</p>
        <p class="mb-4">Entry Time: {{ $session->entry_time }}</p>

        <input type="hidden" name="exit_time" value="{{ now() }}">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">End Session</button>
    </form>
</div>
@endsection