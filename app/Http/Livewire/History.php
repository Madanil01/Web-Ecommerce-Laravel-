<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use App\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public $pesanans;
    public $history = 0;
    public $search;
    public $filter;

    public function render()
    {
        if ($this->search) {
            if (Auth::user()) {
                $this->pesanans = Pesanan::where('user_id', Auth::user()->id)
                    ->where('kode_pemesanan', 'like', '%' . $this->search . '%')
                    ->orderBy('created_at', 'desc')->where('status', '!=', 0)->get();
            }
        } elseif ($this->filter) {
            if ($this->filter == 1) {
                if (Auth::user()) {
                    $this->pesanans = Pesanan::where('user_id', Auth::user()->id)
                        ->where('kode_pemesanan', 'like', '%' . $this->search . '%')
                        ->orderBy('created_at', 'desc')->where('status', 1)->get();
                }
            } elseif ($this->filter == 2) {
                if (Auth::user()) {
                    $this->pesanans = Pesanan::where('user_id', Auth::user()->id)
                        ->where('kode_pemesanan', 'like', '%' . $this->search . '%')
                        ->orderBy('created_at', 'desc')->where('status', 2)->get();
                }
            } elseif ($this->filter == 3) {
                if (Auth::user()) {
                    $this->pesanans = Pesanan::where('user_id', Auth::user()->id)
                        ->where('kode_pemesanan', 'like', '%' . $this->search . '%')
                        ->orderBy('created_at', 'desc')->where('status', 3)->get();
                }
            }
        } else {
            if (Auth::user()) {
                $this->pesanans = Pesanan::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', '!=', 0)->get();
            }
        }


        return view('livewire.history');
    }

    public function update($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 3;
        $pesanan->update();
        session()->flash('message', "Pesanan Selesai dengan Kode : $pesanan->kode_pemesanan");
    }

    public function batal($id)
    {
        //mengurangi stok otomatis ketika check out.
        $pesanans = Pesanan::find($id);
        $details = PesananDetail::where('pesanan_id', $pesanans->id)->get();
        foreach ($details as $detail) {
            $stock = $detail->product->is_ready;
            $product = Product::find($detail->product->id);
            $product->update([
                'is_ready' => $stock,
            ]);
            $detail->delete();
        }
        $pesanans->delete();
        session()->flash('message', "Pesanan dibatalkan dengan kode : $pesanans->kode_pemesanan");
    }
}
