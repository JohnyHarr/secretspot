<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowToSetupAndroidPageController extends Controller
{
    function index(){
        return view('howtosetupandroid');
    }
}
