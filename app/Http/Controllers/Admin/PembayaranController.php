<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pesanan;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

class PembayaranController extends Controller
{  
    public function pembayaran(Request $request, $id)
    {
        
        $pesanan = Pesanan::find($id);
        $gambar = $request->bayar;
        if($gambar){
            $nm = 'Bayar-' . $pesanan->id . '.png';

            $dtUpload = $pesanan;
            $dtUpload->gambar = $nm;

            $gambar->move(public_path() . '/assets/bukti', $nm);
            $dtUpload->save();
        }else{
            return back();
        }        

        return back();
    }
    public function detail($id){

        $historyDetail = Pesanan::find($id);

        if ($historyDetail) {
            $this->product = $historyDetail;
        }
        return view('livewire.historydetail', compact('historyDetail'));
    }
}
