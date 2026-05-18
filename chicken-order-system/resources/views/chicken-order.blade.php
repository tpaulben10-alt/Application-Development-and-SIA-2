<!DOCTYPE html>
<html>
<head>
    <title>Chicken Order System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">🍗 Chicken Order Form</h2>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ALL ERRORS -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/chicken-order" method="POST">
            @csrf

            <!-- NAME -->
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- QUANTITY -->
            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control"
                       value="{{ old('quantity') }}">
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- FLAVOR -->
            <div class="mb-3">
                <label>Chicken Flavor</label>
                <select name="flavor" class="form-control">
                    <option value="">-- Select Flavor --</option>
                    <option value="spicy" {{ old('flavor') == 'spicy' ? 'selected' : '' }}>Spicy</option>
                    <option value="bbq" {{ old('flavor') == 'bbq' ? 'selected' : '' }}>BBQ</option>
                    <option value="garlic" {{ old('flavor') == 'garlic' ? 'selected' : '' }}>Garlic</option>
                </select>
                @error('flavor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- PAYMENT -->
            <div class="mb-3">
                <label>Payment Method</label>
                <select name="payment" class="form-control">
                    <option value="">-- Select Payment --</option>
                    <option value="cash" {{ old('payment') == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="gcash" {{ old('payment') == 'gcash' ? 'selected' : '' }}>GCash</option>
                </select>
                @error('payment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- ADDRESS -->
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary w-100">
                Place Order 🍗
            </button>

        </form>

    </div>
</div>

</body>
</html>