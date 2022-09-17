<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <h3>
                        <strong style="color:black">Check </strong><strong style="color:#ccb952">Out</strong>
                    </h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('keranjang') }}">Keranjang</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color:black">Check Out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <hr>
            <h3>Informasi <span style="color:#ccb952">Pembayaran</span></h3>
            <hr>
            <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar : <strong> Rp. {{ number_format($total_harga) }}</strong> </p>
            <div class="media">
                <img class="mr-3" src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60">
                <div class="media-body">
                    <h5 class="mt-0">BANK BRI</h5>
                    No. Rekening 012345-678-910 atas nama <strong>Madanil</strong>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <hr>
            <h3>Informasi <span style="color:#ccb952">Pengiriman</span></h3>
            <hr>
            <form wire:submit.prevent="checkout">

                <div class="form-group">
                    <label for="">No. HP</label>
                    <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp') }}" autocomplete="name" autofocus>

                    @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <h4 class="text-center" for="">Alamat</h4>
                <div class="form-group">
                    <select class="form-control form-control" wire:model="selectprovinsi" aria-label="Default select example">
                        <option value="" selected>Provinsi</option>
                        @foreach($provinces as $provinsi)
                        <option value="{{$provinsi->name}}">{{$provinsi->name}}</option>
                        @endforeach
                    </select>
                    <p>Provinsi : {{Auth::user()->province}}</p>
                </div>
                <div class="form-group">
                    <select class="form-control form-control" wire:model="selectcity" aria-label="Default select example">
                        <option value="" selected>Kota</option>
                        @foreach($cities as $city)
                        <option value="{{$city->name}} ({{$city->type}})">{{$city->name}} ({{$city->type}})</option>
                        @endforeach
                    </select>
                    <p>Provinsi : {{Auth::user()->city}}</p>
                </div>

                <div class="form-group">
                    <label for="">Kecamatan</label>
                    <input id="selectdistrict" type="text" class="form-control @error('code') is-invalid @enderror" wire:model="selectdistrict" value="{{ old('selectdistrict') }}" autocomplete="name" autofocus>

                    @error('kecamanatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Kelurahan</label>
                    <input id="kelurahan" type="text" class="form-control @error('code') is-invalid @enderror" wire:model="kelurahan" value="{{ old('kelurahan') }}" autocomplete="name" autofocus>

                    @error('kelurahan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Kode Pos</label>
                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" wire:model="code" value="{{ old('code') }}" autocomplete="name" autofocus>

                    @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat Detail</label>
                    <textarea wire:model="alamat" class="form-control @error('nama') is-invalid @enderror" required></textarea>

                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
            </form>
        </div>
    </div>
</div>