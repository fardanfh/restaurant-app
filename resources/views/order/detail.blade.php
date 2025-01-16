@extends('base')

@section('title', 'Detail')

@section('header_title', 'Detail')

@section('content')
    <div class="container">
        <h2>Order Details</h2>

        <div class="card">
            <div class="card-header">
                <h5>Order ID: {{ $order->id }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Customer Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Total Amount:</strong> {{ number_format($order->total_amount, 2) }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>

                <h5>Order Items</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->menu->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
