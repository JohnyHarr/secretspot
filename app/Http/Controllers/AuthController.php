<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('user.main');
        }
        return view('authentication');
    }

    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('main');
        }
        $credentials['login'] = $request->login;
        $credentials['password'] = $request->password;
        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']], false)) {
            $request->session()->regenerate();
            return response('auth_success', 200)->header('Content-Type', 'text/plain');
        } else {
            return response('auth_failed', 200)->header('Content-Type', 'text/plain');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            session()->regenerate();
        }
        return redirect()->route('authentication');
    }


}
