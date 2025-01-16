<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Menu</h1>
        <form id="orderForm" class="mt-4">
            @csrf
            <div class="row">
                @foreach ($menus as $menu)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="d-flex justify-content-center">
                                <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://via.placeholder.com/150' }}"
                                    class="card-img-top img-thumbnail" alt="{{ $menu->name }}"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->name }}</h5>
                                <p class="card-text">Price: ${{ number_format($menu->price, 2) }}</p>
                                <input type="hidden" name="items[{{ $loop->index }}][menu_id]"
                                    value="{{ $menu->id }}">
                                <div class="form-group">
                                    <label for="quantity{{ $loop->index }}">Quantity</label>
                                    <input type="number" id="quantity{{ $loop->index }}"
                                        name="items[{{ $loop->index }}][quantity]" class="form-control" min="1"
                                        value="1">
                                </div>
                                <input type="hidden" name="items[{{ $loop->index }}][price]"
                                    value="{{ $menu->price }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <input type="text" name="customer_name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="customer_email" class="form-control" placeholder="Your Email" required>
            </div>
            <button type="button" id="payButton" class="btn btn-primary btn-block">Order</button>
        </form>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('payButton').onclick = function() {
            var form = document.getElementById('orderForm');
            var formData = new FormData(form);

            fetch('/order', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snapToken) {
                        snap.pay(data.snapToken, {
                            onSuccess: function(result) {
                                alert('Payment success!');
                            },
                            onPending: function(result) {
                                alert('Waiting for your payment!');
                            },
                            onError: function(result) {
                                alert('Payment failed!');
                            }
                        });
                    } else {
                        alert('Failed to get payment token!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while processing your order.');
                });
        };
    </script>
</body>

</html>
