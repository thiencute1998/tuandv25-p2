<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function index() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin')
                ->withSuccess('Signed in');
        }

        return redirect("login")->with('login-fail', 'Wrong email or password');
    }

    public function logout() {
        Auth::logout();

        return redirect('login');
    }
}
