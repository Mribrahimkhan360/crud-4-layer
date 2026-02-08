<?php


namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use function Nette\Utils\first;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findByEmail(string $email)
    {
        return User::where('email',$email)->first();
    }
}
