<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.add-product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $data['image'] = $request->file('image')->store('products','public');
        }

        $this->productService->createProduct($data);

        return redirect()->back()->with('success','Product Added Successfully!');
    }

    public function update(Request $request, $id)
    {
        $this->productService->updateProduct($id,$request->all());
        return redirect()->back()->with('success','Product Updated');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->back()->with('success','Product Deleted');
    }
}
