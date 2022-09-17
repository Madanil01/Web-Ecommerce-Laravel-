<div class="container">
    <div class="card shadow headnew ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <h3><strong style="color:black">List </strong><strong style="color:#ccb952">Tanaman</strong></h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color:black">List Tanaman</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <center>
                <h4 style="color:black;"><strong>{{ $title }}</strong></h4>
            </center>
        </div>
    </div>

    <div class="row mb-4 search">
        <div class="col-md-8">

        </div>
        <div class="col-md-4 ">
            <div class="input-group mb-3">
                <input wire:model="search" type="text" class="form-control" placeholder="Search . . ." aria-label="Search" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card shadow headnew">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <div class="col-md-4">
                                    <select wire:model="filter" name="" id="" class="form-control form-control">
                                        <option value="0">Filter Harga</option>
                                        <option value="1">Termahal</option>
                                        <option value="2">Termurah</option>
                                    </select>
                                </div>
                            </center>
                        </div>
                        <div class="col-md-6">
                            <center>
                                <div class="col-md-4">
                                    <select wire:model="filter2" name="" id="" class="form-control form-control">
                                        <option value="0">Filter Nama</option>
                                        <option value="1">A -> Z</option>
                                        <option value="2">Z -> A</option>
                                    </select>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="products mb-5">
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-3 ">
                <div class="card product shadow border-0">
                    <div class="card-body text-center headnew shadow " style="border-radius: 0.5rem">
                        <img src="{{ url('assets/product') }}/{{ $product->gambar }}" class="img-fluid">
                        <div class="row mt-2 ">
                            <div class="col-md-12">
                                <h6 style="color:#ccb952"><strong>{{ $product->nama }}</strong></h6>
                                <h6 class="harga">Rp. {{ number_format($product->harga) }}</h6>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{ route('products.detail', $product->id) }}" class="btn btn-light btn-block hoverbtn border-0"><i class="fas fa-shopping-cart"></i> Beli</a>
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
    </section>
</div>

<style>
    .filtercard {
        background-color: #1f2225;
    }
</style>