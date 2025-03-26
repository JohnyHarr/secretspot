<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VpnConfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResetUserPasswordController extends Controller
{
    function index()
    {
        $vpnconfigs = VpnConfigs::all();
        $users = User::all()->except(Auth::id());
        return view('adminResetUserPassword', compact('vpnconfigs', 'users'));
    }

    function resetPassword(Request $request)
    {
        try {
            $user = User::all()->find($request->uid);
            $user->password = $request['password'];
            $user->save();
        } catch (\Throwable $th) {
            return redirect()->route('admin.resetUserPassword')->withErrors(['password' => 'failed']);
        }
        return redirect()->route('admin.resetUserPassword')->withErrors(['password' => 'success']);
    }

}
