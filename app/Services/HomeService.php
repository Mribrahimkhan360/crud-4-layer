<?php

namespace App\Services;

use App\Repositories\HomeRepository;

class HomeService
{
    protected $homeRepo;

    public function __construct(HomeRepository $homeRepo)
    {
        $this->homeRepo = $homeRepo;
    }

    public function getPageData()
    {
        // Static page, but structure kept for 4-layer architecture
        return $this->homeRepo->getIndexData();
    }


}
