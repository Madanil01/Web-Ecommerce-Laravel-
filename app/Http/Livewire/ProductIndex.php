<?php

namespace App\Http\Livewire;

use App\Jenis;
use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;
    public $filter;
    public $filter2;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (($this->search) || ($this->filter == 0) && ($this->filter2 == 0)) {
            $products = Product::where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        } elseif ($this->filter) {
            $this->filter2 = 0;
            if ($this->filter == 1) {
                $products = Product::orderBy('harga', 'desc')->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } elseif ($this->filter == 2) {
                $products = Product::orderBy('harga', 'asc')->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } else {
                $products = Product::paginate(8);
            }
        } elseif ($this->filter2) {
            $this->filter = 0;
            if ($this->filter2 == 1) {
                $products = Product::orderBy('nama', 'asc')->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } elseif ($this->filter2 == 2) {
                $products = Product::orderBy('nama', 'desc')->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
            } else {
                $products = Product::paginate(8);
            }
        } else {
            $products = Product::where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        }


        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'Semua Jenis',
            'jenis' => Jenis::all()
            
        ]);
    }
}
