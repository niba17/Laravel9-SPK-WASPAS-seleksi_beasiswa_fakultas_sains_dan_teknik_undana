<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $rules=[
            'nama' => 'required',
            'password' => 'required',
        ];

        $messages=[
            'nama.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ];

        $credentials = $request->validate($rules, $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        } else {
            Session::flash('errMessage', 'Login Gagal!');
            return redirect('/login');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}