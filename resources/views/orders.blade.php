@extends('layouts.business')

@section('content')
<div class="card">
    <h2>Orders</h2>

    <table width="100%" border="1" cellpadding="8">
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>#ORD001</td>
            <td>Rahul Sharma</td>
            <td>₹2,500</td>
            <td>Pending</td>
        </tr>
        <tr>
            <td>#ORD002</td>
            <td>Anita Verma</td>
            <td>₹1,200</td>
            <td>Completed</td>
        </tr>
    </table>
</div>
@endsection
