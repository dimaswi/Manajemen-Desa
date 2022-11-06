<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard_user()
    {
        $jumlah_penduduk = 1200;
        $jumlah_rukun_tetangga = 64;
        $jumlah_perangkat_desa = 25;
        return view('page.dashboard_user',compact(
            'jumlah_penduduk',
            'jumlah_rukun_tetangga',
            'jumlah_perangkat_desa'
        ));
    }
}
