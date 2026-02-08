@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h1 class="mb-4">Dashboard</h1>

        <div class="row g-4">

            <!-- Total Products -->
            <div class="col-md-3">
                <div class="card text-white bg-primary shadow">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text fs-3">120</p>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-md-3">
                <div class="card text-white bg-success shadow">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <p class="card-text fs-3">50</p>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="col-md-3">
                <div class="card text-white bg-warning shadow">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text fs-3">200</p>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col-md-3">
                <div class="card text-white bg-danger shadow">
                    <div class="card-body">
                        <h5 class="card-title">Revenue</h5>
                        <p class="card-text fs-3">$15,000</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Recent Orders Table -->
        <div class="mt-5">
            <h4>Recent Orders</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1001</td>
                    <td>John Doe</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>$250</td>
                </tr>
                <tr>
                    <td>1002</td>
                    <td>Jane Smith</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>$120</td>
                </tr>
                <tr>
                    <td>1003</td>
                    <td>Ali Khan</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                    <td>$0</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
