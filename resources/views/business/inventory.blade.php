@extends('layouts.business')

@section('content')
<div class="card">
    <h2>Add Inventory Item</h2>

    <form>
        <input type="text" placeholder="Product Name">
        <input type="text" placeholder="Category">
        <input type="number" placeholder="Quantity Available">
        <input type="number" placeholder="Price">
        <select>
            <option>Available for Sharing</option>
            <option>Not for Sharing</option>
        </select>
        <textarea placeholder="Sharing Terms (optional)"></textarea>

        <button>Add Inventory</button>
    </form>
</div>

<div class="card">
    <h3>Your Inventory</h3>
    <table width="100%" border="1" cellpadding="8">
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>Rice Bags</td>
            <td>50</td>
            <td>₹1200</td>
            <td>Available</td>
        </tr>
        <tr>
            <td>Cooking Oil</td>
            <td>20</td>
            <td>₹1800</td>
            <td>Shared</td>
        </tr>
    </table>
</div>
@endsection
