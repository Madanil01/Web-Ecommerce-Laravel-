@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('history') }}" class="text-black">History</a></li>
                    <li class="breadcrumb-item active" aria-current="page" class="text-black">Detail Pesanan</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <?php $users = \App\User::where('id', $historyDetail->user_id)->get(); ?>
                <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $historyDetail->id)->get(); ?>
                <div class="card-header">
                    <center>
                        <h5>Detail Pesanan</h5>
                    </center>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Kode Pemesanan</strong> </td>
                            <td>:</td>
                            <td>{{$historyDetail->kode_pemesanan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong> </td>
                            <td>:</td>
                            <td>
                                @if($historyDetail->status == 1)
                                Belum Lunas
                                @elseif($historyDetail->status == 2)
                                Lunas (Proses Pengiriman)
                                @else
                                Pesanan Diterima
                                @endif
                            </td>
                        </tr>
                        <tr>

                            <td><strong>Total Pembayaran</strong></td>
                            <td><strong>Waktu Pemesanan</strong></td>
                        <tr>
                            <td>Rp. {{ number_format($historyDetail->total_harga) }}</td>
                            <td>{{$historyDetail->created_at}}</td>
                        </tr>
                        </tr>
                        <tr>
                            <td><strong>Rincian Pemesanan</strong></td>
                            <td><strong>Pembayaran</strong></td>
                        </tr>
                        <tr>
                            @foreach ($users as $user)
                            <td>{{ $user->alamat }}</td>
                            <td>Tranfer BRI (No Rek :)</td>
                            @endforeach
                        </tr>

                        <tr>
                            <td><strong>Rincian Pesanan</strong></td>
                        </tr>
                        @foreach ($pesanan_details as $pesanan_detail)
                        <tr>
                            <td>
                                <img src="{{ url('assets/product') }}/{{ $pesanan_detail->product->gambar }}" class="img-fluid" width="50">
                            </td>
                            <td>
                                {{ $pesanan_detail->product->nama }}
                            </td>
                            <td>
                                Rp. {{ number_format$pesanan_detail->product->harga }}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection