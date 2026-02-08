<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index()
    {
        $data = $this->homeService->getPageData(); // fetch static data (optional)
        return view('home', $data);
    }
    public function login()
    {
        $data = $this->homeService->getPageData();
        return view('auth.login',$data);
    }
}
