<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tabel_user = DB::table('users')->select('users.*')->first();
        return view('master', compact('tabel_user'));
    }
}
