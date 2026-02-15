<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-dark text-white p-3" id="sidebar-wrapper"
         style="min-width: 220px; min-height: 100vh;">

        <h4 class="text-center mb-4">Dashboard</h4>

        <ul class="nav nav-pills flex-column mb-auto">

            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white">
                    <i class="bi bi-house-door me-3"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="{{ url('products') }}" class="nav-link text-white">
                    <i class="bi bi-person me-3"></i> Add Product
                </a>
            </li>

            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="nav-link text-white border-0 bg-transparent">
                        <i class="bi bi-gear me-3"></i> Logout
                    </button>
                </form>
            </li>

        </ul>
    </div>

    <div class="flex-grow-1" id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <h5 class="ms-3 mb-0">Welcome to Dashboard</h5>
            </div>
        </nav>
        <div class="container my-5">
            <div class="card shadow-lg">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient text-white d-flex justify-content-between align-items-center px-4 py-3">
                        <h4 class="mb-0 fw-semibold text-primary">Edit Product</h4>
                    </div>

                    <div class="px-4 pt-3">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                            <p>
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-success alert-dismissible fade show ">
                                        {{ $error }}
                                    </p>
                                    @endforeach
                                    @endif
                                    </p>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" value="{{ old('name', $product->name) }}"  class="form-control" placeholder="Enter product name">
                            </div>

                            <!-- SKU -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" name="sku" value="{{  old('sku',$product->sku) }}" placeholder="Enter SKU code">
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select" required>
                                    <option selected disabled>Select Category</option>
                                    <option value="Electronics" {{ old('category', $product->category) == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="Fashion" {{ old('category', $product->category) == 'Fashion' ? 'selected' : '' }}>Home & Living</option>
                                    <option value="Home & Living" {{ old('category', $product->category) == 'Home & Living' ? 'selected' : '' }}>Home & Living</option>
                                </select>
                            </div>

                            <!-- Brand -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Brand</label>
                                <select name="brand" class="form-select">
                                    <option disabled>Select Brand</option>
                                    <option value="Apple" {{ old('brand', $product->brand) == 'Apple' ? 'selected' : '' }}>Apple</option>
                                    <option value="Samsung" {{ old('brand', $product->brand) == 'Samsung' ? 'selected' : '' }}>Samsung</option>
                                    <option value="Nike" {{ old('brand', $product->brand) == 'Nike' ? 'selected' : '' }}>Nike</option>
                                </select>
                            </div>

                            <!-- Price -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Price ($)</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" placeholder="0.00" required>
                            </div>

                            <!-- Discount Price -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Discount Price ($)</label>
                                <input type="number"  value="{{ old('discount_price', $product->discount_price) }}" class="form-control" placeholder="0.00" name="discount_price">
                            </div>

                            <!-- Stock -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Stock Quantity</label>
                                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" placeholder="Enter quantity" required>
                            </div>

                            <!-- Product Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Image</label>
                                <input type="file" name="image" class="form-control">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" style="width: 100px; margin-top: 10px;" alt="Product Image">
                                @endif
                            </div>


                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <!-- Featured -->
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="featured" type="checkbox" id="featured">
                                    <label class="form-check-label" for="featured">
                                        Mark as Featured Product
                                    </label>
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_description" rows="2">
                                    {{ old('short_description', $product->short_description) }}
                                </textarea>
                            </div>

                            <!-- Full Description -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Full Description</label>
                                <textarea class="form-control" name="description" rows="5">
                                    {{ old('description', $product->description) }}
                                </textarea>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Update Product</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

