<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Services\HomeService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeService;
    /**
     * @var ProductService
     */
    protected $productService;

    public function __construct(HomeService $homeService,ProductService $productService)
    {
        $this->homeService = $homeService;
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('home', compact('products'));
    }
    public function login()
    {
        $data = $this->homeService->getPageData();
        return view('auth.login',$data);
    }
}
