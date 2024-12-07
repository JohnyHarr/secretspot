<?php

namespace App\Http\Controllers;

use App\Models\VpnServer;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class UpdateServerIdController extends Controller
{
    public function index()
    {
        $servers = VpnServer::all();
        return view('adminUpdateServerId', compact('servers'));
    }

    public function update(Request $request)
    {
        $server = VpnServer::all()->find($request->sid);
        $newServerId = $request->input('newServerId');
        if (!is_null($newServerId)) {
            $server->server_id = $newServerId;
        } else {
            $server->server_id = '';
        }
        $server->save();
        return redirect()->route('admin.updateServerId');
    }

}
