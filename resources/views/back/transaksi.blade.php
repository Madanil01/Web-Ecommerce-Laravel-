@extends('layouts.back.inc.app')
@section('content')
<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3><strong style="color:black">Riwayat </strong><strong style="color:#ccb952">Transaksi</strong></h3>
                </div>
                <div class="col">
                    <form action="" class="float-right">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search}}" placeholder="Kode Pemesanan" class="form-cntrol">
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
                            <li class="breadcrumb-item active" aria-current="page"><strong style="color:black">Riwayat Transaksi</strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Pesanan Baru--}}
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <center>
                <hr>
                <h4><strong>Pesanan </strong><strong style="color:#ccb952">Baru</strong></h4>
                <hr>
            </center>
            <div class="table-responsive">
                <table class="table table-bordered  text-center" style=" border-radius: 0.5rem;">
                    <thead>
                        <tr class="table-active">
                            <td>No.</td>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                            <td>Bukti</td>
                            <td>Konfirmasi</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pesanans1 as $pesanan)
                        @if($pesanan->status == 1)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <?php $users = \App\User::where('id', $pesanan->user_id)->get(); ?>
                            @foreach ($users as $user)
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->province }}, {{ $user->city }}, {{ $user->district }}, {{ $user->kelurahan }}, {{ $user->alamat }}, {{ $user->post_code }}</td>
                            @endforeach
                            <td>{{ $pesanan->created_at }}</td>
                            <td>{{ $pesanan->kode_pemesanan }}</td>
                            <td>
                                <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <div class="col">
                                    <img src="{{ url('assets/product') }}/{{ $pesanan_detail->product->gambar }}" class="img-fluid" width="50">
                                </div>
                                <div class="col">
                                    {{ $pesanan_detail->product->nama }} (x{{ $pesanan_detail->jumlah_pesanan }})
                                </div>
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if($pesanan->status == 1)
                                Belum Lunas
                                @elseif($pesanan->status == 2)
                                Lunas (Proses Pengiriman)
                                @else
                                Pesanan Diterima
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            <td>
                                @if($pesanan->gambar)
                                <a href="{{url('assets/bukti', $pesanan->gambar)}}" style="color:white;">View</a>
                                @endif
                            </td>
                            <td>
                                @if($pesanan->status == 1)
                                <form method="POST" action="{{ route('transaksi.status', $pesanan->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <button id="status" type="submit" class="btn  btn-primary" onclick="return confirm('Ubah Status Pesanan ?')" name="status" value="2" required autocomplete="status" autofocus>Status</button>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                </form>
                                @if($pesanan->status == 1)
                                <a href="{{route('transaksi.batal', $pesanan->id)}}" type="button" onclick="return confirm('Batalkan Pesanan ?')" class="btn btn-danger">Batalkan</a>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="9">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col">
                    {{ $pesanans1->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

{{--Pesanan Harus Kirim--}}
<div class="container">
    <div class="row">
        <div class="col">
            <<center>
                <hr>
                <h4><strong>Perlu </strong><strong style="color:#ccb952">Dikirim</strong></h4>
                <hr>
                </center>
                <div class="table-responsive">
                    <table class="table table-bordered  text-center" style=" border-radius: 0.5rem">
                        <thead>
                            <tr class="table-active">
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Alamat</td>
                                <td>Tanggal Pesan</td>
                                <td>Kode Pemesanan</td>
                                <td>Pesanan</td>
                                <td>Status</td>
                                <td><strong>Total Harga</strong></td>
                                <td>Bukti</td>
                                <td>Resi</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($pesanans2 as $pesanan)
                            @if($pesanan->status == 2)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <?php $users = \App\User::where('id', $pesanan->user_id)->get(); ?>
                                @foreach ($users as $user)
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->alamat }}</td>
                                @endforeach
                                <td>{{ $pesanan->created_at }}</td>
                                <td>{{ $pesanan->kode_pemesanan }} </td>
                                <td>
                                    <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                    @foreach ($pesanan_details as $pesanan_detail)
                                    <div class="col">
                                        <img src="{{ url('assets/product') }}/{{ $pesanan_detail->product->gambar }}" class="img-fluid" width="50">
                                    </div>
                                    <div class="col">
                                        {{ $pesanan_detail->product->nama }} (x{{ $pesanan_detail->jumlah_pesanan }})
                                    </div>
                                    <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($pesanan->status == 1)
                                    Belum Lunas
                                    @elseif($pesanan->status == 2)
                                    Lunas (Proses Pengiriman)
                                    @else
                                    Pesanan Diterima
                                    @endif
                                </td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                <td>
                                    @if($pesanan->gambar)
                                    <a href="{{url('assets/bukti', $pesanan->gambar)}}" style="color:white;">View</a>
                                    @endif
                                </td>
                                <td>
                                    {{$pesanan->resi}}
                                    <br>
                                    @if($pesanan->resi ==null)
                                    <form action="{{route('transaksi.resi', $pesanan->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="resi" name="resi">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    @else
                                    <form action="{{route('transaksi.resi', $pesanan->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="resi" name="resi">
                                        </div>
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="9">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        {{ $pesanans2->links() }}
                    </div>
                </div>
        </div>
    </div>
</div>

{{--Pesanan Selesai--}}
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <hr>
                <h4><strong>Transaksi </strong><strong style="color:#ccb952">Selesai</strong></h4>
                <hr>
            </center>
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="border-radius:0.5rem;">
                    <thead>
                        <tr class="table-active">
                            <td>No.</td>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                            <td>Bukti</td>
                            <td>Resi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pesanans3 as $pesanan)
                        @if($pesanan->status == 3)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <?php $users = \App\User::where('id', $pesanan->user_id)->get(); ?>
                            @foreach ($users as $user)
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->alamat }}</td>
                            @endforeach
                            <td>{{ $pesanan->created_at }}</td>
                            <td>{{ $pesanan->kode_pemesanan }}</td>
                            <td>
                                <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <div class="col">
                                    <img src=" {{ url('assets/product') }}/{{ $pesanan_detail->product->gambar }}" class="img-fluid" width="50">
                                </div>
                                <div class="col">
                                    {{ $pesanan_detail->product->nama }} (x{{ $pesanan_detail->jumlah_pesanan }})
                                </div>
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if($pesanan->status == 1)
                                Belum Lunas
                                @elseif($pesanan->status == 2)
                                Lunas (Proses Pengiriman)
                                @else
                                Pesanan Diterima
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            <td>
                                @if($pesanan->gambar)
                                <a href="{{url('assets/bukti', $pesanan->gambar)}}" style="color:white;">View</a>
                                @endif
                            </td>
                            <td>
                                {{$pesanan->resi}}
                            </td>
                            <td>
                                @if($pesanan->status == 2)
                                <a wire:model="history" wire:click="update({{$pesanan->id}})" class="btn btn-success">Diterima</a>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="9">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $pesanans3->links() }}
        </div>
    </div>
</div>
<style>
    .btn {
        background-color: #ccb952;
    }
</style>
@endsection