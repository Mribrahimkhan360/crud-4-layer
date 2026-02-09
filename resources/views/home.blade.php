<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Grid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-fixed {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            background: #0d6efd;
            color: #fff;
            padding: 12px 15px;
            border-radius: 10px 0px 0px 10px;
            text-decoration: none;
            z-index: 999;
            transition: all 0.3s ease;
        }

        .login-fixed:hover {
            background: #084298;
            padding-left: 20px;
            color: #fff;
        }

        .login-fixed i {
            font-size: 20px;
        }
    </style>
</head>
<body>

<a href="{{ route('auth.login') }}" class="login-fixed">
    Login
</a>

<div class="container mt-5">
    <div class="row g-4">
        @foreach($products as $product)

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('card.png') }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($product->name , 15) }}</h5>
                        <p class="text-muted mb-1">Category: {{ $product->name }}</p>
                        <h6 class="text-danger">$120</h6>
                        <p class="card-text">This is a simple product description. You can describe product features here.</p>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" value="1" min="1">
                        </div>
                        <button class="btn btn-primary me-2">Add to Cart</button>
                        <button class="btn btn-outline-secondary">Buy Now</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
