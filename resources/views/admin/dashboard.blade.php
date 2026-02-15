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
                <form action="{{route('logout')}}" method="post">
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
                <h5 class="ms-3 mb-0">User</h5>
            </div>
        </nav>

        <div class="table-container p-5">
            <h2 class="mb-4">Welcome to Dashboard</h2>
        </div>
    </div>

</div>

</body>
</html>
