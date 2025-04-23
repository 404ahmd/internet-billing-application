<?php

namespace App\Http\Controllers;

use App\Models\RouterOsAPI;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // $ip = '192.168.1.10';
        // $username = 'ahmad';
        // $password = '1234';

        // $API = new RouterOsAPI();
        // $API->debug('false');

        // if ($API->connect($ip, $username, $password)) {

        //     $identity = $API->comm('/system/identity/print');
        //     $router_board = $API->comm('/system/routerboard/print');

        // }else{
        //     return 'koneksi gagal';
        // }

        // $data = [
        //     'identity' => $identity[0]['name'],
        //     'router_model'=>$router_board[0]['model'],
        // ];

        // dd($identity);
        return view('dashboard');
    }
}
