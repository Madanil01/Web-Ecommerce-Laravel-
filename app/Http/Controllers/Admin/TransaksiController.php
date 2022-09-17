<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pesanan;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\PesananDetail;
use App\Product;
use App\User;
use Livewire\Component;


class TransaksiController extends Controller
{
    use WithPagination;
    public $pesanans;
    public function __construct()
    {

        $this->middleware('adminMiddle');
    }

    public function transaksi(Request $request)
    {
        //data tabel
        $search = $request->search;
        if ($search) {
            $pesanans1 = Pesanan::orderBy('created_at', 'desc')->where('status', '1')->when($search, function ($query, $search) {
                return $query->where('kode_pemesanan', 'like', "%{$search}%")->paginate(5, ['*'], 'pesanans1');
            });
            $pesanans2 = Pesanan::orderBy('created_at', 'desc')->where('status', '2')->when($search, function ($query, $search) {
                return $query->where('kode_pemesanan', 'like', "%{$search}%")->paginate(5, ['*'], 'pesanans2');
            });
            $pesanans3 = Pesanan::orderBy('created_at', 'desc')->where('status', '3')->when($search, function ($query, $search) {
                return $query->where('kode_pemesanan', 'like', "%{$search}%")->paginate(5, ['*'], 'pesanans3');
            });
        } else {
            $pesanans1 = Pesanan::orderBy('created_at', 'asc')->where('status', '1')->paginate(5, ['*'], 'pesanans1');
            $pesanans2 = Pesanan::orderBy('created_at', 'asc')->where('status', '2')->paginate(5, ['*'], 'pesanans2');
            $pesanans3 = Pesanan::orderBy('created_at', 'asc')->where('status', '3')->paginate(5, ['*'], 'pesanans3');
        }

        return view('back.transaksi', [
            'pesanans1' => $pesanans1,
            'pesanans2' => $pesanans2,
            'pesanans3' => $pesanans3,
        ]);
    }
    public function status($id)
    {
        $pesanans = Pesanan::find($id);
        /* $details = PesananDetail::where('pesanan_id', $pesanans->id)->get();
        foreach ($details as $detail) {
            $stock = $detail->product->is_ready - $detail->jumlah_pesanan;
            $product = Product::find($detail->product->id);
            $product->update([
                'is_ready' => $stock,
            ]);
        } */
        $pesanans->update([
            'status' => '2',
        ]);
        return back()->with('message', "Pesanan Dikirim dengan Kode : $pesanans->kode_pemesanan");
    }
    public function batal($id)
    {
        //hapus pesanan user ketika tidak segera proses
        $pesanans = Pesanan::find($id);
        $details = PesananDetail::where('pesanan_id', $pesanans->id)->get();
        foreach ($details as $detail) {
            $stock = $detail->product->is_ready + $detail->jumlah_pesanan;
            $product = Product::find($detail->product->id);
            $product->update([
                'is_ready' => $stock,
            ]);
            $detail->delete();
        }
        $pesanans->delete();
        return back()->with('message', "Pesanan Dibatalkan dengan Kode : $pesanans->kode_pemesanan");
    }

    public function resi(Request $request, $id)
    {
        //input resi
        $resi = $request->resi;
        $pesanans = Pesanan::find($id);
        $pesanans->update([
            'resi' => $resi,
        ]);
        return back()->with('message', "Resi Telah diupdate : $pesanans->kode_pemesanan");
    }
}
