<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Yajra\DataTables\Facades\DataTables;

class PendudukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function tambah_penduduk(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nomor_kk' => 'required',
            'status' => 'required',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pekerjaan' => 'required',
            'penghasilan' => 'required',
        ]);
        $data_penduduk = Penduduk::create([
            'nama' => $request->nama,
            'NIK' => $request->nik,
            'nomor_keluarga' => $request->nomor_kk,
            'status' => $request->status,
            'status_perkawinan' => $request->status_perkawinan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan,
            'foto' => $request->file('file')->store('images'),
        ]);
        return redirect('/data_penduduk')
            ->with('success', 'Data Berhasil Ditambahkan!!!')
            ->withErrors('Data Gagal Ditambahkan!!!');
    }
    public function index()
    {
        $jumlah_penduduk = DB::table('master_penduduk')->count();
        return view('penduduk.penduduk', compact('jumlah_penduduk'));
    }
    public function data_penduduk(Request $request)
    {
        $detail_id = $request->modal_detail_id;
        $data_penduduk = DB::table('master_penduduk')
            ->get();
        if ($request->ajax()) {
            $detail_id = $request->modal_detail_id;
            $data_penduduk = DB::table('master_penduduk')
                ->get();
            $detail_penduduk = [];
            return DataTables::of($data_penduduk)->addIndexColumn()
                ->addColumn('actions', function ($data_penduduk) {
                    $detail_penduduk = DB::table('master_penduduk')
                        ->select('master_penduduk.*')
                        ->first();
                    return view('penduduk.penduduk_actions', compact('detail_penduduk'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($data_penduduk);
        return view('penduduk.data_penduduk', compact('data_penduduk'));
    }
    public function edit(Request $request)
    {
        // dd($request->edit_id_penduduk);
        $request->validate([
            'edit_nama' => 'required',
            'edit_nik' => 'required',
            'edit_nomor_keluarga' => 'required',
            'status' => 'required',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'pekerjaan' => 'required',
            'penghasilan' => 'required',
        ]);

        $data_penduduk = [];
        $foto = $request->file('file');

        if ($foto == null) {
            $data_penduduk = Penduduk::where('id', $request->edit_id_penduduk)
                ->update([
                    'nama' => $request->edit_nama,
                    'NIK' => $request->edit_nik,
                    'nomor_keluarga' => $request->edit_nomor_keluarga,
                    'status' => $request->status,
                    'status_perkawinan' => $request->status_perkawinan,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'agama' => $request->agama,
                    'alamat' => $request->alamat,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'pekerjaan' => $request->pekerjaan,
                    'penghasilan' => $request->penghasilan,
                ]);
        } else {
            $data_penduduk = Penduduk::where('id', $request->edit_id_penduduk)
                ->update([
                    'nama' => $request->edit_nama,
                    'NIK' => $request->edit_nik,
                    'nomor_keluarga' => $request->edit_nomor_keluarga,
                    'status' => $request->status,
                    'status_perkawinan' => $request->status_perkawinan,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'agama' => $request->agama,
                    'alamat' => $request->alamat,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'pekerjaan' => $request->pekerjaan,
                    'penghasilan' => $request->penghasilan,
                    'foto' => $request->file('file')->store('images'),
                ]);
        }




        return redirect('/data_penduduk')
            ->with('success', 'Data Berhasil Diedit!!!')
            ->withErrors('Data Gagal Diedit!!!');
    }
    public function hapus($id)
    {
        Penduduk::destroy('id', $id);
        return redirect('/data_penduduk')
            ->with('success', 'Data Berhasil Dihapus!!!')
            ->withErrors('Data Gagal Dihapus!!!');
    }
    public function detail_penduduk(Request $request)
    {
        $data_penduduk = DB::table('master_penduduk')
            ->where('id', $request->id_penduduk)
            ->select('master_penduduk.*')
            ->first();

        dd($data_penduduk->nama);

        return view('penduduk.detail_penduduk', compact('data_penduduk'));
    }
}
