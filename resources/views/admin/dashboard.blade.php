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
<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 position-fixed top-0 start-0 vh-100"
         style="width: 220px;">

        <h4 class="text-center mb-4">Dashboard</h4>

        <ul class="nav nav-pills flex-column mb-auto" style="margin-left: 18px">

            <li class="nav-item">
                <a href="/" class="nav-link text-white">
                    Home
                </a>
            </li>

            <li>
                <a href="{{route('products.create')}}" class="nav-link text-white">
                    Add Product
                </a>
            </li>

            <li>
                <a href="#" class="nav-link text-white">
                    Logout
                </a>
            </li>

        </ul>
    </div>

    <!-- Page Content -->
    <div class="flex-grow-1" style="margin-left: 220px;">
        <nav class="navbar navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <a href="/" class="btn btn-primary" target="_blank">Website</a>
                <h5 class="ms-3 mb-0">Welcome to Dashboard</h5>
            </div>
        </nav>

        <div class="container mt-4">
            <h3>Your Page Content Here</h3>
        </div>
    </div>

</div>

</body>
</html>
