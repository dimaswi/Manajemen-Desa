<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use users;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->id = session()->get('id');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $tabel_user = DB::table('users')->where('id', $id)->select('users.*')->first();
        return view('users.user', compact('tabel_user'));
    }
    public function edit_user(Request $request)
    {
        $id = Auth::user()->id;
        $tabel_user = DB::table('users')->where('id', $id)->select('users.*')->first();
        $image = $tabel_user->image ;
        // dd($image);
        return view('users.edit_user', compact('tabel_user','image'));
    }
    public function simpan_user(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'alamat_rumah' => 'required',
            'nomor_hp' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Storage::delete($request->oldImage);
        $tabel_user = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat_rumah' => $request->alamat_rumah,
            'nomor_hp' => $request->nomor_hp,
            'jabatan' => $request->jabatan,
            'NIP' => $request->nip,
            'image' => $request->file('file')->store('images'),
        ]);
        return redirect('/user');
    }
}
