<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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
//        return view('admin.product.index', compact('products'));
        return view('admin.product.index',compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['featured'] = $request->has('featured') ? 1 : 0;

        if ($request->hasFile('image'))
        {
            $filename = $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('products',$filename,'public');
            $data['image'] = $filename;
        }

        $this->productService->createProduct($data);

        return redirect()->back()->with('success','Product Added Successfully!');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
//        $this->productService->updateProduct($id,$request->all());
//        return redirect()->back()->with('success','Product updated successfully.');
        $data = $request->validated(); // safer than all()

        // featured checkbox handle
        $data['featured'] = $request->has('featured') ? 1 : 0;

        // image check
        if ($request->hasFile('image')) {
            // old image delete korle bhalo
            $product = $this->productService->getProductById($id);
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }

            // new image upload
            $data['image'] = $request->file('image')->store('products','public');
        }

        $this->productService->updateProduct($id,$data);

        return redirect()->back()->with('success','Product updated successfully.');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->back()->with('success','Product Deleted');
    }
}
