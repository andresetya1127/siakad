<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'page' => 'SIAKAD - Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $option = ['email' => $request->email, 'password' => $request->password];

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);


        if (Auth::attempt($option)) {
            $request->session()->regenerate();

            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'email' => 'Email Tidak Ditemukan.',
        ])->onlyInput('email');
    }


    public function log_out(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.index');
    }
}
