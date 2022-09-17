@extends('layouts.back.inc.app')
@section('content')

<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')}}
    </div>
    @endif
</div>

<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col-md-9">
                    <h3><strong>Home </strong><strong style="color:#ccb952">Admin</strong></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card shadow headnew">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3>Informasi <span class="span">umum</span></h3>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-12 ">
                            <div class="card admin text-white bg-success shadow">
                                <div class="card-body admin-body">
                                    <h4 class="mt-2">Jumlah User</h4>
                                    <h2 class="text-right"><i class="fas fa-user float-left"></i><span>{{$user}}</span></h2>
                                    <a href="{{ route('admin.user') }}" class="mb-2 text-white">Detail <span class="float-right">{{$user}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-12">
                            <div class="card admin text-white bg-danger shadow">
                                <div class="card-body admin-body">
                                    <h4 class="mt-2">Jumlah Product</h4>
                                    <h2 class="text-right"><i class="fas fa-shopping-bag float-left"></i><span>{{$product}}</span></h2>
                                    <a href="{{route('product')}}" class="mb-2 text-white">Detail <span class="float-right">{{$product}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card shadow headnew">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3>Semua <span class="span">Transaksi</span> </h3>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 ">
                            <div class="card admin text-white bg-warning shadow">
                                <div class="card-body admin-body">
                                    <h4 class="mt-2">Belum Bayar</h5>
                                        <h2 class="text-right"><i class="float-left fas fa-dollar-sign"></i><span>{{$baru}}</span></h2>
                                        <a href="{{route('transaksi')}}" class="mb-2 text-white">Detail <span class="float-right">{{$baru}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 ">
                            <div class="card admin text-white bg-primary shadow ">
                                <div class="card-body admin-body">
                                    <h4 class="mt-2">Harus Dikirim</h4>
                                    <h2 class="text-right"><i class="float-left fas fa-truck"></i></i><span>{{$kirim}}</span></h2>
                                    <a href="{{route('transaksi')}}" class="mb-2 text-white">Detail <span class="float-right">{{$kirim}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 ">
                            <div class="card admin text-white bg-success shadow ">
                                <div class="card-body admin-body">
                                    <h4 class="mt-2">Terselesaikan</h5>
                                        <h2 class="text-right"><i class="float-left fas fa-clipboard-check"></i></i><span>{{$selesai}}</span></h2>
                                        <a href="{{route('transaksi')}}" class="mb-2 text-white">Detail <span class="float-right ">{{$selesai}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .admin:hover {
        border-color: black;
    }

    .admin-body:hover {
        color: black;
    }

    .span {
        color: #ccb952;
    }
</style>

@endsection