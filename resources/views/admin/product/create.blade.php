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
                <a href="{{url('products')}}" class="nav-link text-white">
                    <i class="bi bi-person me-3"></i>Add Product
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
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
                <a href=""></a>
                <h5 class="ms-3 mb-0">Create Product</h5>
            </div>
        </nav>
        <div class="container my-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white flex">
                    <h4 class="mb-0">Add New Product</h4>
                    <p>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show text-green-800" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </p>
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

                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter product name"/>
                            </div>

                            <!-- SKU -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" name="sku" placeholder="Enter SKU code">
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select" required>
                                    <option selected disabled>Select Category</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Fashion">Home & Living</option>
                                    <option value="Home & Living">Home & Living</option>
                                </select>
                            </div>

                            <!-- Brand -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Brand</label>
                                <select name="brand" class="form-select">
                                    <option selected disabled>Select Brand</option>
                                    <option value="Apple">Apple</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Nike">Nike</option>
                                </select>
                            </div>

                            <!-- Price -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Price ($)</label>
                                <input type="number" name="price" class="form-control" placeholder="0.00" required>
                            </div>

                            <!-- Discount Price -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Discount Price ($)</label>
                                <input type="number" class="form-control" placeholder="0.00">
                            </div>

                            <!-- Stock -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Stock Quantity</label>
                                <input type="number" name="stock" class="form-control" placeholder="Enter quantity" required>
                            </div>

                            <!-- Product Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Image</label>
                                <input type="file" name="image" class="form-control">
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
                                    <input type="hidden" name="featured" value="0">
                                    <input
                                        class="form-check-input"
                                        name="featured"
                                        type="checkbox"
                                        id="featured"
                                        value="1"
                                        {{ old('featured', $product->featured ?? 0) ? 'checked' : '' }}
                                    >

                                    <label class="form-check-label" for="featured">
                                        Mark as Featured Product
                                    </label>
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_description" rows="2" placeholder="Write short description..."></textarea>
                            </div>

                            <!-- Full Description -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Full Description</label>
                                <textarea class="form-control" name="description" rows="5" placeholder="Write full product details..."></textarea>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="text-end">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-success">Add Product</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
