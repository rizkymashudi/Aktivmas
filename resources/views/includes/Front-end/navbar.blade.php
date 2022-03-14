<!-- Navbar -->
<div class="container-fluid sticky-top bg-white">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('landingpage') }}" class="navbar-brand">
            <img src="Front-end/images/logo.png" alt="logo masjid agung">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav__menu" id="navb">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-md-2">
                    <a href="{{ Route::is('landingpage') ? '#hero' : route('landingpage') }}" class="nav-link active-link">Beranda</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ Route::is('landingpage') ? '#services' : route('landingpage') }}" class="nav-link">Layanan</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Informasi</a>
                    <div class="dropdown-menu">
                        <a href="{{ Route::is('landingpage') ? '#sholat' : route('landingpage') }}" class="dropdown-item">Waktu solat</a>
                        <a href="{{ route('announcement') }}" class="dropdown-item">Pengumuman</a>
                        <a href="{{ Route::is('landingpage') ? '#activity' : route('landingpage') }}" class="dropdown-item">Kegiatan</a>
                        <a href="{{ Route::is('landingpage') ? '#report' : route('landingpage') }}" class="dropdown-item">Informasi keuangan masjid</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ Route::is('landingpage') ? '#facility' : route('landingpage') }}" class="nav-link">Fasilitas</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ Route::is('landingpage') ? '#about' : route('landingpage') }}" class="nav-link">Tentang</a>
                </li>
            </ul>

            <!-- Mobile button -->
            <form action="{{ route('donate') }}" class="form-inline d-sm-block d-md-none">
                <button class="btn btn-donate my-2 my-sm-0">
                    Donasi
                </button>
            </form>


            <!-- Desktop button -->
            <form action="{{ route('donate') }}" class="form-inline my-2 my-lg-0 d-none d-md-block">
                <button class="btn btn-donate btn-navbar-right my-2 my-sm-0 px-4">
                    Donasi
                </button>
            </form>

        </div>
    </nav>
</div>