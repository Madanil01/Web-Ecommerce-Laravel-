<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <h3><strong style="color:black">Detail </strong><strong style="color:#ccb952">Produk</strong></h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products') }}">List Tanaman</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color:black">Detail Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            @if(session()->has('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
            @endif
        </div>
    </div>

    <div class="card mt-4 headnew">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card gambar-product">
                        <div class="card-body">
                            <img class="detail" src="{{ url('assets/product') }}/{{ $product->gambar }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>
                        <strong>{{ $product->nama }}</strong>
                    </h2>
                    <h4>
                        Rp. {{ number_format($product->harga) }}
                        @if($product->is_ready > 0)
                        <span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stok</span>
                        @else
                        <span class="badge badge-danger"> <i class="fas fa-times"></i> Stok Habis</span>
                        @endif
                    </h4>

                    <div class="row">
                        <div class="col">
                            <form wire:submit.prevent="masukkanKeranjang">
                                <table class="table" style="border-top : hidden">
                                    <tr>
                                        <td>Jenis</td>
                                        <td>:</td>
                                        <td>
                                            <img src="{{ url('assets/jenis') }}/{{ $product->jenis->gambar }}" class="img-fluid" width="50">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stock </td>
                                        <td>:</td>
                                        <td>{{ $product->is_ready }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan </td>
                                        <td>:</td>
                                        <td>{{ $product->keterangan }}</td>
                                    </tr>

                                    <tr>
                                        <td>Jumlah</td>
                                        <td>:</td>
                                        <td>
                                            <input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="name" autofocus>

                                            @error('jumlah_pesanan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>(isi jika lokasi diluar JABODETABEK)</strong> </td>
                                    </tr>
                                    <tr>
                                        <td>Tambahan</td>
                                        <td>:</td>
                                        <td>Rp. 30.000 </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Kota</td>
                                        <td>:</td>
                                        <td>
                                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" value="{{ old('nama') }}" autocomplete="name" autofocus>

                                            @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        @if($product->is_ready > 0)
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                                        </td>
                                        @endif
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>