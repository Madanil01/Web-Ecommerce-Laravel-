@extends('layouts.back.inc.app')
@section('content')

<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3><strong style="color:black">List </strong><strong style="color:#ccb952">Product</strong></h3>
                </div>
                <div class="col">
                    <form action="" class="float-right">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search}}" placeholder="Search" class="form-cntrol">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><strong style="color:black">List Product</strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col">
            <a type="button" href="{{route('product.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card" style="border-radius: 0.5rem;">
                    <div class=" card-body text-center headnew shadow" style="border-radius: 0.5rem; height: 20rem">
                        <img src="{{ url('assets/product') }}/{{ $product->gambar }}" class="img-fluid" style="height: 10rem">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h6><strong style="color:#ccb952">{{ $product->nama }}</strong> </h6>
                                <h6>Rp. {{ number_format($product->harga) }}</h6>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{route('product.detail', $product->id)}}" class="btn btn-success"><i class="fas fa-eye"></i>Detail</a>
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                <button href="{{route('product.delete', $product->id)}}" class="btn btn-danger" onclick="return confirm('Yahin akan menhapus Produk ? ')"><i class="fas fa-trash"></i>Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

@endsection