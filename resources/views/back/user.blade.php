@extends('layouts.back.inc.app')
@section('content')

<div class="container">
    <div class="card shadow headnew">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3><strong style="color:black">List </strong><strong style="color:#ccb952">User</strong></h3>
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
                            <li class="breadcrumb-item active" aria-current="page"><strong style="color:black">List User</strong></li>
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
        <form action="{{route('admin.filter')}}" method="get">
            <div class="col float-left">
                <select id="filter" name="filter" onchange="this.form.submit()" class="form-control form-control sm w-auto float-right">
                    <option value="0">Filter Nama</option>
                    <option value="1">A->Z</option>
                    <option value="2">Z->A</option>
                </select>
            </div>
        </form>
        <div class="col float-right">
            <a type="button" href="{{route('admin.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-dark mt-2" style="border-radius: 0.5rem;">
                    <thead>
                        <tr class="table-active">
                            <td>No.</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Alamat</td>
                            <td>No HP</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $user->name }}

                            </td>
                            <td>
                                {{ $user->email }}

                            </td>
                            <td>
                                {{ $user->alamat }}
                            </td>
                            <td>
                                {{ $user->nohp }}
                            </td>
                            <td>
                                <a type="button" href="{{route('admin.edit',$user->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                <a type="button" href="{{route('admin.delete',$user->id)}}" class="btn btn-danger" onclick="return confirm('Yahin akan menhapus User ? ')">
                                    <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $users->links() }}
        </div>
    </div>
</div>
<style>
    .btn {
        background-color: #ccb952;
    }
</style>

@endsection