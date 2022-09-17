@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <h3><strong style="color:black">Profile </strong><strong style="color:#ccb952">{{ $user->name }}</strong></h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color:black">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    @if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')}}
    </div>
    @endif
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow headnew">
                <div class="card-body">
                    <h4><i class="fas fa-user"></i> My <span style="color:#ccb952">Profile</span></h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td>{{$user->nohp}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$user->province}}, {{$user->city}}, {{$user->district}}, {{$user->kelurahan}}</td>
                            </tr>
                            <tr>
                                <td>Alamat Detail</td>
                                <td>:</td>
                                <td>{{$user->alamat}}, Kode Post : {{$user->post_code}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card shadow headnew">
                <div class="card-body">
                    <h4><i class="fas fa-pen"></i> Edit <span style="color:#ccb952">Profile</span></h4>
                    <form method="POST" action="{{ route('profile.edit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nohp" class="col-md-4 col-form-label text-md-right">{{ __('No Hp') }}</label>

                            <div class="col-md-6">
                                <input id="nohp" type="nohp" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $user->nohp }}">

                                @error('nohp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="provinsi" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-control" name="selectprovinsi" aria-label="Default select example">
                                    <option value="0" selected>Provinsi</option>
                                    @foreach($provinces as $provinsi)
                                    <option value="{{$provinsi->name}}">{{$provinsi->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-control" name="selectcity" aria-label="Default select example">
                                    <option value="0" selected>Kota</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->name}} ({{$city->type}})">{{$city->name}} ({{$city->type}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">
                                <input id="kecamatan" type="text" class="form-control @error('nohp') is-invalid @enderror" name="kecamatan" value="{{ $user->district }}">

                                @error('kecamatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-right">{{ __('Kelurahan') }}</label>

                            <div class="col-md-6">
                                <input id="kelurahan" type="nohp" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ $user->kelurahan }}">

                                @error('kelurahan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Kode Post') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $user->post_code }}">

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Detail') }}</label>

                            <div class="col-md-6">
                                <textarea id="alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" cols="30" rows="3">{{ $user->alamat }}</textarea>

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection