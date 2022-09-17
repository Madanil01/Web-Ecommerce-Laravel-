@extends('layouts.back.inc.app')
@section('content')
<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3><strong style="color:black">Detail </strong><strong style=" color:#ccb952">Product</strong></h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product') }}">Daftar Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><strong style="color:black">Detail Product</strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <center>
        <hr>
        <h4><strong>Detail </strong><strong style="color:#ccb952">Product</strong></h4>
        <hr>
    </center>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow headnew">
                <div class="card-body">
                    <h2 style="color:#ccb952"><strong>{{$productDetail->nama}}</strong></h2>
                    <br>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Jenis </h5>
                                </td>
                                <td>
                                    <h5>:</h5>
                                </td>
                                <td>
                                    <h5>{{$productDetail->jenis->nama}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Harga </h5>
                                </td>
                                <td>
                                    <h5>:</h5>
                                </td>
                                <td>
                                    <h5>Rp. {{ number_format($productDetail->harga) }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Stok</h5>
                                </td>
                                <td>
                                    <h5>:</h5>
                                </td>
                                <td>
                                    <h5>{{$productDetail->is_ready}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Keterangan</h5>
                                </td>
                                <td>
                                    <h5>:</h5>
                                </td>
                                <td>
                                    <h5>{{$productDetail->keterangan}}</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow headnew">
                <div class="card-body">
                    <center>
                        <img class="detailimage" src="{{ url('assets/product') }}/{{ $productDetail->gambar }}" class="img-fluid">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .detailimage {
        max-width: 235px;
        min-width: 235px;
        min-height: 295px;
    }
</style>
@endsection