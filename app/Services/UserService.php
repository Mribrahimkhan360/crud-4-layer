<?php


namespace App\Services;


use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepo->create($data);
    }

    public function loginUser(string $email, string $password, bool $remember = false)
    {
        $user = $this->userRepo->findByEmail($email);

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, $remember); // This actually logs in the user
            return ['status' => true, 'message' => 'Login successful'];
        }

        return ['status' => false, 'message' => 'Invalid credentials'];
    }
}
