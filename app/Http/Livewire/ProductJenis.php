<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Jenis;
use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductJenis extends Component
{
    use WithPagination;

    public $search, $jenis;
    public $filter;
    public $filter2;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($jenisId)
    {
        $jenisDetail = Jenis::find($jenisId);

        if($jenisDetail) {
            $this->jenis = $jenisDetail;
        }
    }

    public function render()
    {
        if($this->search) {
            $products = Product::where('jenis_id', $this->jenis->id)->where('nama', 'like', '%'.$this->search.'%')->paginate(8);
        }else {
            $products = Product::where('jenis_id', $this->jenis->id)->paginate(8);
        }
        if (($this->search) || ($this->filter == 0) && ($this->filter2 == 0)) {
            $products = Product::where('jenis_id', $this->jenis->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        } elseif ($this->filter) {
            $this->filter2 = 0;
            if ($this->filter == 1) {
                $products = Product::orderBy('harga', 'desc')->where('jenis_id', $this->jenis->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } elseif ($this->filter == 2) {
                $products = Product::orderBy('harga', 'asc')->where('jenis_id', $this->jenis->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } else {
                $products = Product::where('jenis_id', $this->jenis->id)->paginate(8);
            }
        } elseif ($this->filter2) {
            $this->filter = 0;
            if ($this->filter2 == 1) {
                $products = Product::orderBy('nama', 'asc')->where('jenis_id', $this->jenis->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } elseif ($this->filter2 == 2) {
                $products = Product::orderBy('nama', 'desc')->where('jenis_id', $this->jenis->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } else {
                $products = Product::where('jenis_id', $this->jenis->id)->paginate(8);
            }
        } else {
            $products = Product::where('jenis_id', $this->jenis->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        }

        
        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'Jenis Tanaman '.$this->jenis->nama
        ]);
    }
}
