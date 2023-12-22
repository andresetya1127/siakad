<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    protected $log;



    public function __construct()
    {
        $this->log = Log::channel('siakad');
    }

    public function index()
    {
        return view('auth.login', [
            'page' => 'SIAKAD - Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $option = ['email' => $request->email, 'password' => $request->password];

        $msg = [
            '*.required' => 'Form Wajib Diisi.',
            '*.captcha' => 'Captcha Tidak Sesuai.',
            '*.numeric' => 'Format harus Angka.',
        ];
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha|numeric'
        ], $msg);


        if (Auth::attempt($option)) {
            $request->session()->regenerate();

            $this->log->info('User Telah Login', ['user' => Auth::user()->name]);

            return redirect()->route('admin.index');
        }


        return back()->withErrors(['email' => 'Data Tidak Ditemukan.'])->withInput();
    }


    public function log_out(Request $request)
    {
        $this->log->info('User Berhasil LogOut', ['user' => Auth::user()->name]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.index');
    }
}
