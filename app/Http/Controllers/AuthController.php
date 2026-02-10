<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Request;
use function Termwind\ValueObjects\p;

class AuthController extends Controller
{
    protected $userService;
    protected $authService;
    //
    public function __construct(UserService $userService,AuthService $authService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }
    public function login()
    {
       return view('auth.login');
    }

    public function authLogin(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember');

        $loginResult = $this->userService->loginUser($email, $password, $remember);

        if ($loginResult['status']) {
            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        } else {
            return back()->with('error', $loginResult['message']);
        }
    }


    public function register()
    {
        return view('auth.register');
    }

    public function authRegister(RegisterRequest $request)
    {
        $this->userService->register($request->validated());

        return redirect()->back()->with('success','Register Successfully!');
    }

    public function logout(Request $request)
    {
        $this->authService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
