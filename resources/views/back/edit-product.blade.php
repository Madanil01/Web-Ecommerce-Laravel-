@extends('layouts.back.inc.app')
@section('content')
<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3><strong>Edit </strong><strong style="color:#ccb952">Product</strong></h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product') }}">Daftar Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><strong>Edit Product</strong></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card headnew">
                <div class="card-header text-center" style="color:#ccb952;">{{('Edit Data Product')}}</div>

                <div class=" card-body">
                    <form method="POST" action="{{ route('product.update', $productDetail->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $productDetail->nama }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                            <div class="col-md-6">
                                <input id="harga" type="harga" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $productDetail->harga }}" required autocomplete="harga">

                                @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_ready" class="col-md-4 col-form-label text-md-right">{{ __('Ketersediaan') }}</label>

                            <div class="col-md-6">
                                <input id="is_ready" type="is_ready" class="form-control @error('is_ready') is-invalid @enderror" name="is_ready" value="{{ $productDetail->is_ready}}" required autocomplete="is_ready">

                                @error('is_ready')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                            <div class="col-md-6">
                                <input id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ $productDetail->keterangan }}" required autocomplete="keterangan"></input>
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar" class="col-md-4 col-form-label text-md-right">{{ __('File Gambar') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar" class="col-md-4 col-form-label text-md-right">{{ __('Gambar') }}</label>

                            <div class="col-md-6">
                                <img src="{{ url('assets/product') }}/{{ $productDetail->gambar }}" class="img-fluid" style="height: 10rem">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_id" class="col-md-4 col-form-label text-md-right">{{ __('Jenis') }}</label>

                            <div class="col-md-6">
                                <input name="jenis_id" type="text" class="form-control @error('jenis_id') is-invalid @enderror" id="jenis_id" value="{{ $productDetail->jenis_id }}" autocomplete="jenis_id" autofocus>
                                @error('jenis_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary float-right">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card headnew ml-2">
                    <div class="card-header text-center" style="color:black;">{{('Pilihan Jenis')}}</div>
                    <div class=" ml-3" style="color:black;">
                        <p>1. Has Bunga</p>
                        <p>2. Hias Daun</p>
                        <p>3. Hias Akar</p>
                        <p>4. Hias Buah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection