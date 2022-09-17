<div class="jumbotron jumbotron-fluid" style="background-image :url('assets/Banner/jumbotron.png')">
   <div class="container">
      <h1 class="display-4">Get <strong style="color:#ccb952;">Fast</strong> and <strong style="color:#ccb952;">Safety</strong> <br> to Buy With Us.</h1>
      <div class="row text-center mb-5 ">
         <div class="col">
            <a href="{{ route('products') }}" class="btn float-center text shopbtn">
               <i class="fas fa-search"></i>
               Shop Now
            </a>
         </div>
      </div>
   </div>
</div>

<div class="content">
   <div class="container">
      {{-- BANNER --}}
      <div id="carouselExampleControls" class="carousel slide shadow;" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         </ol>
         <div class="carousel-inner ">
            <div class="carousel-item active">
               <img src="{{ url('assets/Banner/slider1.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="{{ url('assets/Banner/slider2.png') }}" class="d-block w-100" alt="...">
            </div>
         </div>
         <a class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>

      {{-- PILIH JENIS  --}}

      <section class="pilih-liga mt-4">
         <div class="card shadow headnew">
            <div class="card-body">
               <center>
                  <h3><strong style="color:black"></strong>Pilih</strong><strong style="color:#ccb952"> Jenis</strong></h3>
               </center>
            </div>
         </div>
         <div class="row mt-4">
            @foreach($jenis as $jenis)
            <div class="col">
               <a href="{{ route('products.jenis', $jenis->id) }}">
                  <div class="card cardhomenew shadow">
                     <div class="card-body text-center">
                        <img src="{{ url('assets/jenis') }}/{{ $jenis->gambar }}" class="img-fluid">
                     </div>
                  </div>
               </a>
            </div>
            @endforeach
         </div>
      </section>
   </div>
</div>

<div class="container mt-4 info">
   <div class="card shadow headnew">
      <div class="card-body">
         <center>
            <h3><strong>Simple </strong><strong style="color:#ccb952">Infromation</strong></h3>
         </center>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6 mt-4">
         <div class="card shadow cardhomenew">
            <div class="card-body">
               <div class="row">
                  <div class="col">
                     <img class="homeimage" src="{{ url('assets/product/home1.png') }}" alt="">
                  </div>
                  <div class="col">
                     <h4>Hias <strong style="color:#ccb952">Bunga</strong></h4>
                     <p>Tanaman hias bunga merupakan tanaman hias yang memiliki
                        bunga sebagai daya tarik utamanya.
                        Beberapa jenis tanaman hias bunga antara
                        lain mawar, melati, anggrek, euphorbia, serta adenium.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 mt-4">
         <div class="card shadow cardhomenew">
            <div class="card-body">
               <div class="row">
                  <div class="col">
                     <img class="homeimage" src="{{ url('assets/product/home2.png') }}" alt="">
                  </div>
                  <div class="col">
                     <h4>Hias <strong style="color:#ccb952">Daun</strong></h4>
                     <p>Tanaman hias daun memiliki letak keindahan dari
                        daunnya yang unik dengan karakter yang kuat.
                        Beberapa jenis tanaman hias daun antara lain suplir,
                        keladi red star, aglaonema, dieffenbachia.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6 mt-4">
         <div class="card shadow cardhomenew">
            <div class="card-body">
               <div class="row">
                  <div class="col">
                     <img class="homeimage" src="{{ url('assets/product/home3.png') }}" alt="">
                  </div>
                  <div class="col">
                     <h4>Hias <strong style="color:#ccb952">Akar</strong></h4>
                     <p>Tanaman hias akar adalah tanaman yang mempunyai keunggulan pada bagian akarnya.
                        Keberadaan akar diatas tanah ini tampak seperti papan yang melintang,
                        sangat serasi sekali berpadu dengan batang dan daunnya.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 mt-4">
         <div class="card shadow cardhomenew">
            <div class="card-body">
               <div class="row">
                  <div class="col">
                     <img class="homeimage" src="{{ url('assets/product/home4.png') }}" alt="">
                  </div>
                  <div class="col">
                     <h4>Hias <strong style="color:#ccb952">Buah</strong></h4>
                     <p>Tanaman hias buah merupakan tanaman
                        hias yang mempunyai buah yang dapat dimanfaatkan untuk bahan apa pun itu.
                        Beberapa jenis tanaman hias buah antara lain krismil (tomat hias),
                        jeruk nagami, zaitun, long mulberry.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="products mt-4">
   <div class="container">
      <div class="card shadow headnew">
         <div class="card-body">
            <center>
               <h3><strong>Best </strong><strong style="color:#ccb952">Product</strong></h3>
            </center>
         </div>
      </div>
      <div class="row mt-4">
         @foreach($products as $product)
         <div class="col-md-3 ">
            <div class="card shadow">
               <div class="card-body text-center cardhomenew shadow" style="border-radius: 0.5rem">
                  <img src="{{ url('assets/product') }}/{{ $product->gambar }}" class="img-fluid product">
                  <div class="row mt-2 ">
                     <div class="col-md-12 ">
                        <h6 style="color:#ccb952"><strong>{{ $product->nama }}</strong> </h6>
                        <h6 class="harga">Rp. {{ number_format($product->harga) }}</h6>
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col-md-12">
                        <a href="{{ route('products.detail', $product->id) }}" class="btn btn-light btn-block hoverbtn border-0">
                           <i class="fas fa-eye"></i> Detail</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>

<style>

</style>