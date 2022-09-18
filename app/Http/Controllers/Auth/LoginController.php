<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->level == 'ADMIN') {
                return redirect()->intended('/admin-panel')->with('login', 'Login berhasil');
            }
            if (Auth::user()->level == 'DOKTER') {
                return redirect()->intended('/dokter-panel')->with('login', 'Data berhasil disimpan');
            }
            if (Auth::user()->level == 'APOTEKER') {
                return redirect()->intended('/apoteker-panel')->with('login', 'Data berhasil disimpan');
            }
        }

        return redirect()->to(route('login'))->with('loginError', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
