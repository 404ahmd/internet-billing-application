<?php

namespace App\Http\Controllers;

use App\Models\MikrotikRouter;
use App\Models\RouterOsAPI;
use Illuminate\Http\Request;

class MikrotikRoutercontroller extends Controller
{
    public function index()
    {
        $routers = MikrotikRouter::all();
        return view('router.view_router', [
            'routers' => $routers,
        ]);
    }

    public function store(Request $request, MikrotikRouter $router)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'ip_address' => 'required',
            'username' => 'required|string',
            'password' => 'required',
        ]);

        try {

            $API = new RouterOsAPI();
            $API->debug(false);

            $is_connected = $API->connect(
                $validated['name'],
                $validated['ip_address'],
                $validated['username'],
                $validated['password']
            );

            if (!$is_connected) {
                return redirect()->back()->with('error', 'router tidak ditemukan atau periksa lagi kredensial');
            }

            $router->create($validated);
            return redirect()->route('router.view')->with('success', 'router berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'ada yang salah', $e->getMessage())->withInput();
        }
    }

    // public function connect($id){
    //     $router = MikrotikRouter::findOrFail($id);
    //     $API = new RouterOsAPI();
    //     $API->debug(false);

    //     try {
    //         $API->connect($router->ip_address, $router->username, $router->password);
    //         $response = $API->comm('/interface/print');
    //         return response()->json($response);
    //     } catch (\Exception $e) {
    //         $e->getMessage();
    //     }
    // }

    public function destroy($id)
    {
        $router_id = MikrotikRouter::findOrFail($id);
        if (!$router_id) {
            return redirect()->back()->with('error', 'data tidak bisa dihapus');
        }

        $router_id->delete();
        return redirect()->back()->with('success', 'router berhasil dihapus');
    }
}
