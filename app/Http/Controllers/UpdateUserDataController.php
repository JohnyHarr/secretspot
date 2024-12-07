<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VpnConfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserDataController extends Controller
{
    public function index()
    {
        $vpnconfigs = VpnConfigs::all();
        $users = User::all();
        return view('adminChangeUserData', compact('vpnconfigs', 'users'));
    }

    public function update(Request $request)
    {
        $dataToUpdate = User::find($request->uid)->vpnConfigs()->first();
        $dataToUpdate->aeza = $request->aeza;
        $dataToUpdate->hostVDS = $request->hostVDS;
        $dataToUpdate->save();
        return redirect()->route('admin.updateUserData');
    }

    public function delete(Request $request)
    {
        User::find($request->uid)->delete();
        return redirect()->route('admin.updateUserData');
    }
}
