<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        Auth::attempt($data);
        if (Auth::check()) {
            // login Berhasil
            return redirect('/dashboard');
        } else {
            Session::flash('error-message', 'Wrong email or password');
            return redirect()->route('login.index');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
