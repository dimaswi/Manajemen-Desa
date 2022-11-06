<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard_warga()
    {
        $jumlah_penduduk = DB::table('master_penduduk')->count();
        $jumlah_rukun_tetangga = 64;
        $jumlah_perangkat_desa = 25;
        return view('page.dashboard',compact(
            'jumlah_penduduk',
            'jumlah_rukun_tetangga',
            'jumlah_perangkat_desa'
        ));
    }
}
