<?php


namespace App\Http\Controllers\Admin;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController
{

    public function index()
    {
        Auth::check();
        return view('admin.login');
    }

    public function login(AdminLoginRequest $request)
    {
        if (!Auth::attempt($request->only('username', 'password')))
        {
            return redirect()->route('login')->with('error','Wrong username or password');
        }
        return redirect()->route('admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
