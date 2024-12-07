<?php

namespace App\Http\Controllers;



use App\Models\VpnServer;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        $user = Auth::user();
        $vpnServers= VPNServer::all();
        $aezaId = $vpnServers->where('server_name', 'aeza')->first()->server_id;
        $hostVDSId = $vpnServers->where('server_name', 'hostVDS')->first()->server_id;
        return view('main', compact('user', 'aezaId', 'hostVDSId'));
    }
}
