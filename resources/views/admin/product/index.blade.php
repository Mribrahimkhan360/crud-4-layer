<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
</head>
<body>
<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 position-fixed top-0 start-0 vh-100"
         style="width: 220px;">

        <h4 class="text-center mb-4">Dashboard</h4>

        <ul class="nav nav-pills flex-column mb-auto" style="margin-left: 18px">

            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{url('products')}}" class="nav-link text-white">
                    Add Product
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-white border-0 bg-transparent">
                        <i class="bi bi-gear me-0"></i> Logout
                    </button>
                </form>

            </li>

        </ul>
    </div>

    <!-- Page Content -->
    <div class="flex-grow-1" style="margin-left: 220px;">
        <nav class="navbar navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <p></p>
                <h5 class="ms-3 mb-0">Product List</h5>
            </div>
        </nav>

        <div class="table-container p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Products List</h2>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Add Products</a>
            </div>
            <div class="table-responsive">
                @if($products->count() > 0)
                <table class="table table-striped table-hover align-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>sku</th>
                        <th>category</th>

                        <th>brand</th>
                        <th>price</th>
                        <th>discount price</th>
                        <th>stock</th>
                        <th>image</th>
                        <th>description</th>
                        <th>featured</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" style="width: 50px; margin-top: 10px;" alt="Product Image">
                            @endif
                        </td>
                        <td> {{ Str::limit($product->description, 20) }}</td>
                        <td><span class="badge bg-success">{{$product->featured}}</span></td>
                        <td><span class="">{{$product->status}}</span></td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links() }}
                    </div>
                @else
                    <p>No products found.</p>
                @endif
            </div>
        </div>
    </div>

</div>

</body>
</html>
