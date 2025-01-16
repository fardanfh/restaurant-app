@extends('base')

@section('title', 'Order')

@section('header_title', 'Order')

@section('content')
    <div class="page-heading">
        <h3>Data Order</h3>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ number_format($order->total_amount, 2) }}</td>
                            <td><span class="badge bg-success">{{ $order->status }}</span></td>
                            <td>{{ $order->created_at->format('d-M-Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('order.show', $order->id) }}" class="btn icon btn-secondary">
                                    <i class="bi bi-info"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
