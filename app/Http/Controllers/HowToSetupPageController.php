<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowToSetupPageController extends Controller
{
    function index()
    {
        return view('howtosetup');
    }
}
