<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UpdatePasswordController extends Controller
{
    public function index()
    {
        return view('updatePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(['password' => 'required|string|max:255|min:8']);
        Auth::user()->password = $request['password'];
        if (Auth::user()->save())
            return response('success', 200)->header('Content-Type', 'text/plain');
        return response('failed', 200)->header('Content-Type', 'text/plain');
    }

}
