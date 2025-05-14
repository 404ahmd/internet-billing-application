<?php

namespace App\Http\Controllers;

use App\Models\RouterOsAPI;
use Illuminate\Http\Request;

class DumpController extends Controller
{
    //
    public function getMikrotikInfo(){

        $API = new RouterOsAPI();
        $API->debug(false);
        $ip = '192.168.1.14';
        $username = 'admin';
        $password = 'pass';


        try {
            $connecting = $API->connect($ip, $username, $password);

            if (!$connecting) {
                echo "Tidak terambung";
            }

            echo "Berhasil tersambung";
            $response = $API->comm('/system/routerboard/print');
            return response()->json($response);
        } catch (\Exception $e) {
            $e->getMessage();
        }

    }
}
