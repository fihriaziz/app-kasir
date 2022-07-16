<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function v_login()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $credentials = $req->only(['email', 'password']);

        if(Auth::attempt($credentials)) {
            if(Auth::user()->roles == 'kasir') {
                return to_route('create-nota');
            } else {
                return to_route('dashboard');
            }
        } else {
            return to_route('login');
        }

    }

    public function v_register()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $this->validate($req,[
            'name' => 'required',
            'email' => 'required|unique:users,name|email',
            'password' => 'required',
            'confirm_password' => 'same:password'
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
        ]);

       return to_route('dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function v_forgot()
    {
        return view('auth.forgot-password');
    }

    public function acitonForgotPassword(Request $req)
    {

    }
}
