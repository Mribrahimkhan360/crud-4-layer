<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.dashboard');
    }
    public function product()
    {
        $products =$this->productService->getAllProducts();
        return view('admin.product',compact('products'));
    }
    public function create()
    {
        return view('admin.product.create');
    }
}
