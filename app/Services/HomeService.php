<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\HomeRepository;

class HomeService
{
    protected $homeRepo;
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getPageData()
    {
        // Static page, but structure kept for 4-layer architecture
        return $this->getPageData()->all();
    }


}
