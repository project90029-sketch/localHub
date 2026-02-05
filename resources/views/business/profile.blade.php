@extends('layouts.business')

@section('content')
<div class="card">
    <h2>Business Profile</h2>

    <form>
        <label>Business Name</label>
        <input type="text" placeholder="Enter business name">

        <label>Business Type</label>
        <input type="text" placeholder="Retail / Wholesale / Service">

        <label>Description</label>
        <textarea placeholder="Describe your business"></textarea>

        <label>Opening Time</label>
        <input type="time">

        <label>Closing Time</label>
        <input type="time">

        <label>Delivery Available</label>
        <select>
            <option>Yes</option>
            <option>No</option>
        </select>

        <label>Payment Methods</label>
        <input type="text" placeholder="Cash, UPI, Card">

        <button>Save Profile</button>
    </form>
</div>
@endsection
