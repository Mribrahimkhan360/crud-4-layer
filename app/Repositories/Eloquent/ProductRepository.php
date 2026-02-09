<?php


namespace App\Repositories\Eloquent;


use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
       return Product::all();
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
       return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->find($id);
        return $product->update($data);
    }

    public function delete($id)
    {
        $product = $this->find($id);
        return $product->delete();
    }
}
