<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Http\UploadedFile;


class ProductController extends Controller
{
    use WithPagination;
    public function __construct()
    {

        $this->middleware('adminMiddle');
    }

    public function product(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $products = Product::orderBy('nama', 'asc')->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")->paginate(8);
            });
        } else {
            $products = Product::orderBy('nama', 'asc')->paginate(8);
        }

        return view('back.product', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('back.create-product');
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->gambar->getClientOriginalExtension();
        if (request()->hasFile('gambar')) {
            $uploadedImage = $request->file('gambar');
            $imageName = time() . '.' . $request->gambar->getClientOriginalExtension();
            $destinationPath = public_path('/assets/product');
            $uploadedImage->move($destinationPath, $imageName);
            $request->gambar->imagePath = $destinationPath . $imageName;
        }
        Product::create([
            'nama' => $request->name,
            'harga' => $request->harga,
            'is_ready' => $request->is_ready,
            'keterangan' => $request->keterangan,
            'gambar' => $imageName,
            'jenis_id' => $request->jenis_id,
        ]);

        return redirect('admin/product')->with('message', 'Data Berhasil di Tambah');;
    }

    public function edit($id)
    {
        $productDetail = Product::find($id);

        if ($productDetail) {
            $this->product = $productDetail;
        }
        return view('back.edit-product', compact('productDetail'));
    }

    public function update(Request $request, $id)
    {

        $productDetail = Product::find($id);
        $awal = $productDetail->gambar;
        if ($request->gambar) {
            $request->gambar->move(public_path() . '/assets/product', $awal);
        }
        $productDetail->update([
            'nama' => $request->name,
            'harga' => $request->harga,
            'is_ready' => $request->is_ready,
            'keterangan' => $request->keterangan,
            'gambar' => $awal,
            'jenis_id' => $request->jenis_id,
        ]);

        return redirect('admin/product')->with('message', "Product $productDetail->nama Berhasil di Update ");
    }

    public function destroy($id)
    {

        $productDetail = Product::find($id);
        $file = 'assets/product/' . $productDetail->gambar;

        if (file_exists($file)) {
            @unlink($file);
        }

        $productDetail->delete();
        return redirect('admin/product')->with('message', "Product $productDetail->nama Berhasil di Hapus");
    }

    public function detail($id)
    {
        $productDetail = Product::find($id);

        return view('back.detail-product', compact('productDetail'));
    }
}
