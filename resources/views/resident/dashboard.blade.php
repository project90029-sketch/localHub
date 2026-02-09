@extends('layouts.resident')

@section('content')
<h2>Welcome, Resident 👋</h2>
<div class="stats-grid">
    <x-stats-card
        title="Active Bookings"
        value="3"
        icon="calendar-check"
    />

    <x-stats-card
        title="Nearby Professionals"
        value="12"
        icon="users"
        iconColor="green"
    />

    <x-stats-card
        title="Pending Requests"
        value="1"
        icon="clock"
        iconColor="orange"
    />
</div>

@endsection
