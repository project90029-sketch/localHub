@extends('layouts.resident')

@section('content')
<h2>Available Services</h2>

<div class="grid-3">
    <div class="card">
        <h3>Electrician</h3>
        <p>Wiring, switches, repairs</p>
        <button class="btn-primary">Book Now</button>
    </div>

    <div class="card">
        <h3>Plumber</h3>
        <p>Pipes, leakage, fittings</p>
        <button class="btn-primary">Book Now</button>
    </div>

    <div class="card">
        <h3>AC Technician</h3>
        <p>Installation & servicing</p>
        <button class="btn-primary">Book Now</button>
    </div>
</div>
@endsection
