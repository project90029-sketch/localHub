@extends('layouts.resident')

@section('content')
<h2>My Bookings</h2>

<table class="table">
    <thead>
        <tr>
            <th>Service</th>
            <th>Professional</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Electrician</td>
            <td>Rahul Das</td>
            <td><span class="badge success">Confirmed</span></td>
            <td>12 Feb 2026</td>
        </tr>

        <tr>
            <td>Plumber</td>
            <td>Pending</td>
            <td><span class="badge warning">Pending</span></td>
            <td>14 Feb 2026</td>
        </tr>
    </tbody>
</table>
@endsection
