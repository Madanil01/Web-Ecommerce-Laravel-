<div>
    <nav class="navbar navbar-expand-md text-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <strong><span style="color:black;">Puri</span></strong><strong style="color:#ccb952;">Florist</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <strong><a class="nav-link" href="{{ route('home') }}">Home</a></strong>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Jenis Tanaman</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($jenis as $jenis)
                            <a class="dropdown-item" href="{{ route('products.jenis', $jenis->id) }}">{{ $jenis->nama }}</a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('products') }}">Semua Jenis</a>
                        </div>
                    </li>
                    @guest
                    @else
                    <li class="nav-item">
                        <strong><a class="nav-link" href="{{ route('history') }}">History</a></strong>

                    </li>
                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->


                    @guest
                    <li class="nav-item">
                        <strong><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </strong>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <strong><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></strong>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <strong><a class="nav-link" href="{{ route('keranjang') }}">
                                Keranjang <i class="fas fa-shopping-bag"></i>
                                @if($jumlah_pesanan !==0)
                                <span class="badge badge-danger">{{ $jumlah_pesanan }}</span>
                                @endif
                            </a></strong>

                    </li>
                    <li class="nav-item dropdown btn btnnav">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu  menunav dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Profile') }}
                            </a>

                            <a class="dropdown-item menunav" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>

<style>
    .navbar {
        background-color: #f8f9fa;
    }

    .menunav a {
        color: #ccb952;
    }
</style>