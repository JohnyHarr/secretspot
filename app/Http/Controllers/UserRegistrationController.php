<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VpnConfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    public function index(){
        return view('adminRegistration');
    }

    public function register(Request $request){
        $credentials = $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:50',
            'role' => 'string'
        ]);
        $user = new User;
        $user->login = $credentials['login'];
        $user->password = $credentials['password'];
        $user->role = $credentials['role'];
        if (User::where('login', '=', $credentials['login'])->exists()) {
            return response('reg_failed', 200)->header('Content-Type', 'text/plain');
        }
        $user->save();
        if (!User::where('login', '=', $credentials['login'])->exists()) {
            return response('reg_failed', 200)->header('Content-Type', 'text/plain');
        }
        $vpnConfigs = new VpnConfigs;
        $vpnConfigs->user_id = $user->id;
        $vpnConfigs->save();
        return response('reg_success', 200)->header('Content-Type', 'text/plain');
    }
}
