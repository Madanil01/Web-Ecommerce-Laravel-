<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $jumlah = 0;

    public function __construct()
    {

        $this->middleware('adminMiddle');
    }

    public function index()
    {
        $user = DB::table('users')->count();
        $product = DB::table('products')->count();
        $baru = DB::table('pesanans')->where('status', '1')->count();
        $kirim = DB::table('pesanans')->where('status', '2')->count();
        $selesai = DB::table('pesanans')->where('status', '3')->count();
        return view('back.home', compact('user','product','baru','kirim','selesai'));
    }
}
