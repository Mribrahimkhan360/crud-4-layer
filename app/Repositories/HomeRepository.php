<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class HomeRepository implements ProductRepositoryInterface
{
    protected $model;
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getIndexData()
    {
        return $this->model->all();
    }
}
