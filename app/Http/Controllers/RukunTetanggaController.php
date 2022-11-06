<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RukunTetangga;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Penduduk;

class RukunTetanggaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function data_rukun_tetangga(Request $request)
    {
        if ($request->ajax()) {
            $data_rukun_tetangga = DB::table('master_rukun_tetangga')
                ->get();
            $detail_penduduk = [];
            return DataTables::of($data_rukun_tetangga)
                ->addIndexColumn()
                ->make(true);
        }
        return view('penduduk.data_rukun_tetangga');
    }
    public function data_penduduk(Request $request)
    {
        if ($request->ajax()) {
            $data_penduduk = DB::table('master_penduduk')
                ->get();
            $detail_penduduk = [];
            return DataTables::of($data_penduduk)
                ->addIndexColumn()
                ->make(true);
        }
        return view('penduduk.data_rukun_tetangga');
    }
    public function edit_rukun_tetangga(Request $request)
    {
        // dd($request->edit_jumlah_warga);
        $data_rukun_tetangga = RukunTetangga::where('id',$request->id_rukun_tetangga)
        ->update([
            'rukun_tetangga' => $request->edit_rukun_tetangga,
            'ketua_rt' => $request->edit_nama_ketua_rt,
            'jumlah_warga' => $request->edit_jumlah_warga,
        ]);

        return redirect('/rukun_tetangga');
    }
}
