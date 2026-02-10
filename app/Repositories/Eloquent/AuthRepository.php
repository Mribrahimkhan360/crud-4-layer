<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function logout()
    {
        Auth::logout();
    }
}
