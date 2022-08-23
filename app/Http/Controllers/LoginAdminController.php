<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('signinadmin', [
            'title'     => 'LuxSpace Furniture | SignIn Admin'
        ]);
    }
    public function auth(Request $request)
    {
        $validasi = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }
    public function signout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/signin-admin');
    }
}