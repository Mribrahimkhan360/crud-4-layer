<?php


namespace App\Services;


use App\Repositories\Contracts\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function logout()
    {
        return $this->authRepository->logout();
    }
}
