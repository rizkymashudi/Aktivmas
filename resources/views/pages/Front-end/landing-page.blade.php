@extends('layouts.landingpage')

@section('content')
<main>

    <!-- Hero / Header -->
    <header class="hero__section" id="hero">
        <div class="container">
            <div class="row row__hero justify-content-center align-items-end">
                <div class="col-sm header__text pt-5 px-5 wow animate__animated animate__zoomIn" data-wow-delay="0.1s">
                    <h1> 
                       Website Resmi Masjid Raya Batam
                    </h1>
                    <p class="my-5">
                        Jl, Engku Putri, Teluk Tering, Kec Batam Kota, Kota Batam, Kepulauan riau 29444
                    </p>
                    <a href="#services" class="btn btn-services px-4 mt-5">
                        Layanan
                    </a> 
                </div>
                <div class="col-5 col-sm-6">
                    <div class="image__hero">
                        <img class="img-fluid img-responsive" src="/Front-end/images/heroo.png" alt="hero">
                    </div>
                </div>
                
            </div>
            
        </div>
    </header>
 
    <!-- Informasi section -->
    <section class="information__section" id="sholat">
        <div class="container py-5">
            <div class="row mx-auto mx-sm-auto my-5 justify-content-center">
                <div class="col col-sm pt-2">
                    <h1>Waktu Shalat Masjid Agung <br> Kota Batam</h1>
                </div>
                <div class="col col-sm pt-5">
                </div>
            </div>
            
            <div class="row mx-auto mx-sm-auto my-4 row__content">
                <div class="col col-sm-12 col-lg-7 py-5">
                    <span class="tanggal__hari">{{ date('l, j \\ F Y', strtotime($todaySholat['date'])) }}</span>
                    <div class="card mt-4 card__pukul wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s" style="border-radius: 10px;">
                        <div class="card-body">
                            <div class="container">
                                <div class="row pukul__title">
                                    <div class="col col-sm text-center" >Shalat</div>
                                    <div class="col col-sm text-center" >Adzan</div>
                                </div>
                            </div>
                           
                            <hr>
                        <div class="row border pukul mx-auto align-items-center mt-5 mb-4">
                            <div class="col col-sm pl-4">
                                <img src="/Front-end/images/Clock.svg" alt="icon">
                                Subuh
                            </div>
                            <div class="col col-sm text-center">{{ $todaySholat['subuh'] ? $todaySholat['subuh'] : "-" }} WIB</div>
                        </div>
                        <div class="row border pukul mx-auto align-items-center mt-4 mb-4">
                            <div class="col col-sm pl-4">
                                <img src="/Front-end/images/Clock.svg" alt="icon">
                                Dzuhur
                            </div>
                            <div class="col col-sm text-center">{{ $todaySholat['dzuhur'] ? $todaySholat['dzuhur'] : "-"  }} WIB</div>
                        </div>
                        <div class="row border pukul mx-auto align-items-center mt-4 mb-4">
                            <div class="col col-sm pl-4">
                                <img src="/Front-end/images/Clock.svg" alt="icon">
                                Ashar
                            </div>
                            <div class="col col-sm text-center">{{ $todaySholat['ashar'] ? $todaySholat['ashar'] : "-"  }} WIB</div>
                        </div>
                        <div class="row border pukul mx-auto align-items-center mt-4 mb-4">
                            <div class="col col-sm pl-4">
                                <img src="/Front-end/images/Clock.svg" alt="icon">
                                Maghrib
                            </div>
                            <div class="col col-sm text-center">{{ $todaySholat['maghrib'] ? $todaySholat['maghrib'] : "-"  }} WIB</div>
                        </div>
                        <div class="row border pukul mx-auto align-items-center mt-4">
                            <div class="col col-sm pl-4">
                                <img src="/Front-end/images/Clock.svg" alt="icon">
                                Isya
                            </div>
                            <div class="col col-sm text-center">{{ $todaySholat['isya'] ? $todaySholat['isya'] : "-" }} WIB</div>
                        </div>
                        </div>
                    </div>
                    <div class="card mt-4 card__sun wow animate__animated animate__fadeInUp" data-wow-delay="0.4s" style="border-radius: 10px;">
                        <div class="card-body">
                            <div class="row sun__rise mx-auto align-items-center justify-content-between mt-4">
                                <div class="col col-sm col-lg-5 ml-3">
                                    <img src="/Front-end/images/sunrise.svg" alt="icon">
                                    sunrise
                                </div>
                                <div class="col col-sm col-lg-5 text-right mr-4">{{ $todaySholat['terbit'] ? $todaySholat['terbit'] : "-" }} WIB</div>
                            </div>

                            <div class="row sun__set mx-auto justify-content-between align-items-center mt-4">
                                <div class="col col-sm col-lg-5 ml-3">
                                    <img src="/Front-end/images/sunset.svg" alt="icon">
                                    sunset
                                </div>
                                <div class="col col-sm col-lg-5 text-right mr-4">18.20 WIB</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-12 col-lg-5 py-5">
                    <span class="tanggal__hari">{{ isset($jumat['date']) ? date('l, j \\ F Y', strtotime($jumat['date'])) : 'tidak tersedia'}}</span>
                    <div class="card mt-4 card__jumat wow animate__animated animate__fadeInRight" data-wow-delay="0.3s" style="border-radius: 10px;">
                        <div class="card-body">
                        <h5 class="card-title text-center mt-2" style="font-weight: bold;">Khatib Khotbah Jumat</h5>
                        @if (isset($jumat['photo']) == null)
                        <img class="avatar mt-5 mb-5 mx-auto d-block" src="/Front-end/images/profile.png" alt="image">
                        @else
                        <img class="avatar mt-5 mb-5 mx-auto d-block" src="{{ Storage::url($jumat['photo'])}}" alt="images">
                        @endif
                        <h5 class="card-text text-center" style="font-weight: bold;">{{ isset($jumat['name']) ? $jumat['name'] : 'tidak tersedia' }}</h5>
                            <div class="card-body card__khotbah mt-4 border" style="border-radius: 10px;">
                                <h6 class="card-text text-center" style="font-weight: bold;">Khotbah jumat dimulai pada pukul</h6>
                                <div class="row border jam__khotbah mx-auto mx-sm-auto align-items-center mt-4">
                                    <div class="col col-sm">{{ isset($jumat['time_khotbah']) ? date('H:i', strtotime($jumat['time_khotbah'])) : '-' }} WIB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan section -->
    <section class="layanan__section pb-lg-5" id="services">
        <div class="container pb-5">
            <div class="box-title align-items-center text-center p-5">
                <h1>Layanan Masjid Agung <br> Kota Batam</h1>
            </div>
            <div class="container">
                <div class="row mx-sm-auto d-flex justify-content-around row__activity my-1">
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/Teacher.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Dakwah</h4>
                        </div>
                    </div>
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/User Groups.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Majelis taklim</h4>
                        </div>
                    </div>
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/Online Support.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Konseling</h4>
                        </div>
                    </div>
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/Crowdfunding.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Wakaf</h4>
                        </div>
                    </div>
                </div>
                <div class="row mx-sm-auto d-flex justify-content-around row__activity my-1">
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/Ramadan.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Mualaf center</h4>
                        </div>
                    </div>
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/Donate.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Donasi online</h4>
                        </div>
                    </div>
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/Member.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Remaja masjid</h4>
                        </div>
                    </div>
                    <div class="col col-sm-7 col-md col-lg col__activity wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                        <div class="box__activity my-4 text-center shadow">
                            <img src="/Front-end/images/icons/Mosque.svg" alt="Dakwah" class="mt-4 mb-2">
                            <h4>Baitul mal</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Jadwal kegiatan section -->
    <section class="jadwal__section" id="activity">
        <div class="container py-5">
            <div class="row row__head mx-auto mx-sm-auto align-items-center justify-content-between px-3 py-4 mt-5">
                <h1>Jadwal Kegiatan Masjid Agung <br> Kota Batam</h1>
                <a href="{{ Route('activities-detail') }}" class="btn btn-sm shadow-sm show__all my-5 py-2" style="font-size: 18px">
                    Jadwal lainnya
                </a>
            </div>
            <div class="container mt-4 mb-5 pb-5">
                <div class="row my-5">
                    <div class="col col-sm-12 col-md-12 col-lg-7 offset animate__animated wow animate__fadeInLeft" data-wow-delay="0.1s">
                        @if (!empty($todayActivity))
                        <div class="card shadow mt-4 card__jadwal p-3 flex-row" style="border-radius: 10px;">
                            <div class="poster"> 
                                <img class="img-fluid mx-auto" src="{{ $todayActivity['poster'] ? Storage::url($todayActivity['poster']) : 'https://via.placeholder.com/900x1200' }}" alt="poster">
                            </div>
                            <div class="card-body caption">
                                <h2 class="card-title">{{ $todayActivity['activity_name'] }}</h2>
                                <div class="row mx-auto mx-sm-auto justify-content-between text-muted">
                                    <p>
                                        <i class="fa fa-solid fa-calendar mr-1"></i>
                                        {{ date("d M Y", strtotime($todayActivity['activity_date'])) }}
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-clock mr-1"></i>
                                        {{ date("h:i", strtotime($todayActivity['activity_time'])) }} WIB
                                    </p>
                                </div>
                                <p class="deskripsi">
                                    {!! substr(strip_tags($todayActivity['activity_detail']), 0, 200) !!}
                                    @if (strlen($todayActivity['activity_detail']) > 200)
                                        <span id="dots">...</span>
                                        <span id="more">{!! substr($todayActivity['activity_detail'], 200) !!}</span>
                                    @endif
                                </p>
                                <div class="text-right mt-2">
                                   
                                </div>
                                
                            </div>
                        </div>
                        @else
                        <div class="card shadow mt-4 card__jadwal p-3 flex-row" style="border-radius: 10px;">
                            <div class="poster"> 
                                <img class="img-fluid img-responsive mx-auto" src="https://via.placeholder.com/900x1200" alt="poster">
                            </div>
                            <div class="card-body caption">
                                <h1 class="card-title">Tidak ada kegiatan</h1>
                                <div class="row mx-auto mx-sm-auto justify-content-between text-muted">
                                    <p>
                                        <i class="fa fa-solid fa-calendar mr-1"></i>
                                        -
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-clock mr-1"></i>
                                        - WIB
                                    </p>
                                </div>
                                <div class="row mx-auto mx-sm-auto text-muted">
                                    <p>
                                        <i class="fa-solid fa-user-group"></i>
                                        umum
                                    </p>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque in officia reprehenderit 
                                    laborum culpa corrupti atque amet placeat enim obcaecati totam voluptatibus, 
                                    exercitationem provident, soluta porro quis adipisci labore tempore?
                                </p>
                                <div class="text-right mt-5">
                                    <a href="#" class="btn btn-sm btn-primary" style="pointer-events: none">
                                        Baca lebih lanjut
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col col-sm col-md col-lg-5 animate__animated animate__fadeInRight">
                        @forelse ($incomingActivity->skip(1) as $incoming)
                        <div class="wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">
                            <div class="card shadow-sm my-4 card__list align-items-center" style="border-radius: 10px;">
                                <div class="date__box text-center py-1 ml-2">
                                    <h5 style="letter-spacing: 1px">{{ date('D d M', strtotime($incoming->activity_date)) }}</h5>
                                </div>
                                <div class="card-body body__caption mx-auto mt-3 px-2">
                                    <h5 class="judul__jadwal px-2">{{ $incoming->activity_name }}</h5>
                                    <div class="row mx-auto mx-sm-auto justify-content-between px-2 text-muted">
                                        <p><i class="fa-solid fa-bullhorn mr-1"></i>{{ $incoming->performer }}</p>
                                        <p><i class="fa-solid fa-clock mr-1"></i>{{ date('h:i', strtotime($incoming->activity_time)) }} WIB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            @for ($i = 0; $i < 5; $i++)
                            <div class="wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">
                                <div class="card shadow-sm my-4 card__list align-items-center" style="border-radius: 10px;">
                                    <div class="date__box text-center py-1 ml-2">
                                        <h5 style="letter-spacing: 1px">tidak ada</h5>
                                    </div>
                                    <div class="card-body body__caption mx-auto mt-3 px-2">
                                        <h5 class="judul__jadwal px-2">tidak ada kegiatan</h5>
                                        <div class="row mx-auto mx-sm-auto justify-content-between px-2 text-muted">
                                            <p><i class="fa-solid fa-bullhorn mr-1"></i>test</p>
                                            <p><i class="fa-solid fa-clock mr-1"></i> - WIB</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        @endforelse
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    
    <!-- kas section -->
    <section class="kas__section" id="report">
        <div class="container">
            <div class="box-title align-items-center text-center p-5">
                <h1>Laporan Keuangan Masjid Agung <br> Kota Batam</h1>
                <h3 class="mt-5">{{ now()->format('F Y') }}</h3>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 wow animate__animated animate__zoomIn" data-wow-delay="0.2s">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Tanggal</td>
                                            <td>Uraian</td>
                                            <td>Debet</td>
                                            <td>Kredit</td>
                                            <td>Saldo</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($reports as $kas)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ date('l, j \\ F Y', strtotime($kas->date)) }}</td>
                                                <td>{!! $kas->description !!}</td>
                                                <td>Rp.{{ number_format($kas->debet) }}</td>
                                                <td>Rp.{{ number_format($kas->credit) }}</td>
                                                <td>Rp.{{ number_format($kas->balance) }}</td>
                                            </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @empty 
                                        <tr>
                                            <td class="text-center p-5" colspan="6">Data tidak tersedia</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas section -->
    <section class="pt-5 pb-5 facility__section" id="facility">
        <div class="container">
            <div class="row mx-auto mx-md-auto mt-5">
                <div class="col col-6">
                    <h1 class="mb-3" style="font-weight: bold;">Fasilitas Masjid Agung Batam </h1>
                </div>
                <div class="col col-6 text-right mt-3">
                    <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col col-sm-12 mt-5">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row mx-auto">
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                        <div class="card shadow"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <div class="card-body">
                                                <h4 class="card-title">Tempat Shalat</h4>
                                                <p class="card-text">
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque tenetur maiores quas placeat,
                                                    </p>
        
                                            </div>
        
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                        <div class="card shadow animate__animated animate__fadeInUp"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="/Front-end/images/facility/halaman.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">Tempat penitipan Alas kaki</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                        <div class="card shadow animate__animated animate__fadeInUp"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="/Front-end/images/facility/masjid3.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">Kolam air mancur</h4>
                                                <p class="card-text">Sebagai Antisipasi terhadap jamaah yang meluap, disediakan pula keran-keran air wudhu yang menjadi kesatuan dengan kolam air mancur sebagai elemen estetis dan penyejuk ruang luar. Kolam ini semata-mata penanda pada pintu utara sekaligus elemen statis.</p>
        
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row mx-auto">
        
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                        <div class="card shadow" style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
                                            </div>
        
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                        <div class="card shadow"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                        <div class="card shadow"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row mx-auto">
        
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                        <div class="card shadow"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
                                            </div>
        
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                        <div class="card shadow"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                        <div class="card shadow"  style="border-radius: 10px;">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang section -->
    <section class="pt-5 pb-5 tentang__section" id="about">
        <div class="container mt-5">

            <div class="row mx-auto mx-sm-auto featurette my-5">
                <div class="col-12 col-sm col-md order-md-1 mx-auto my-5 text-center wow animate__animated animate__fadeInLeft" data-wow-delay="0.1s">
                    <img src="/Front-end/images/facility/masjid3.jpeg" alt="masjid" class="img-fluid masjid">
                </div>
                <div class="col col-sm col-md order-md-2 wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">
                    <h2 class="featurette-heading">Tentang Masjid Agung Batam</h2>
                    <p class="lead mt-5">
                        Masjid Agung Batam atau disebut Masjid Raya Batam (MRB) merupakan sebuah masjid yang terletak di Batam Kepulauan Riau Indonesia. Masjid ini memiliki kubah dengan bentuk unik yang berdesain limas segi empat atau seperti piramida. Masjid ini dilengkapi dengan menara setinggi 66 m. Selain menjadi tempat ibadah, masjid ini menjadi pesona daya tarik pariwisata
                        Masjid ini memiliki kubah dengan bentuk unik yang berdesain limas segi empat atau seperti piramida. Bentuk limas sama sisi (teriris tiga bagian) dipilih dengan pertimbangan bahwa bentuk atap yang cocok untuk denah bangunan bujur sangkar, mempunyai persepsi vertikalisme menuju satu titik di atas sebagai simbol hubungan antara manusia dan Tuhan (habluminallah). Sedangkan Irisan tiga bagian merupakan simbol perjalanan hidup manusia (sebagai hamba Allah) dalam tiga alam yaitu alam rahim, alam dunia, dan alam akhirat.
                    </p>
                </div>
            </div>
        
            <hr class="featurette-divider">
        
            <div class="row mx-auto mx-sm-auto featurette my-5 flex-row-reverse">
                <div class="col-12 col-sm col-md mx-auto my-5 text-center wow animate__animated animate__fadeInRight" data-wow-delay="0.1s" text-center">
                    <img src="/Front-end/images/facility/hall.jpeg" alt="masjid" class="img-fluid masjid">
                </div>
                <div class="col col-sm col-md wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s">
                    <h2 class="featurette-heading">Visi dan misi</h2>
                    <p class="lead mt-5">
                        Masjid Agung Batam atau disebut Masjid Raya Batam (MRB) merupakan sebuah masjid yang terletak di Batam Kepulauan Riau Indonesia. Masjid ini memiliki kubah dengan bentuk unik yang berdesain limas segi empat atau seperti piramida. Masjid ini dilengkapi dengan menara setinggi 66 m. Selain menjadi tempat ibadah, masjid ini menjadi pesona daya tarik pariwisata
                        Masjid ini memiliki kubah dengan bentuk unik yang berdesain limas segi empat atau seperti piramida. Bentuk limas sama sisi (teriris tiga bagian) dipilih dengan pertimbangan bahwa bentuk atap yang cocok untuk denah bangunan bujur sangkar, mempunyai persepsi vertikalisme menuju satu titik di atas sebagai simbol hubungan antara manusia dan Tuhan (habluminallah). Sedangkan Irisan tiga bagian merupakan simbol perjalanan hidup manusia (sebagai hamba Allah) dalam tiga alam yaitu alam rahim, alam dunia, dan alam akhirat.
                    </p>
                </div>
            </div>
        
        </div>
    </section>

    <!-- CTA Section -->
    <section class="pt-5 pb-5 cta__section" id="">
        <div class="container mx-auto mx-sm-auto">
            <img src="/Front-end/images/donate.jpg" alt="img-float" class="img__float img-fluid img-thumbnail rounded-circle shadow wow animate__animated animate__bounceIn" data-wow-delay="0.3s">
            <img src="/Front-end/images/nabung.jpg" alt="img-float" class="img__float2 img-fluid img-thumbnail rounded-circle shadow wow animate__animated animate__bounceIn" data-wow-delay="0.4s">
            <div class="box-title align-items-center text-center p-5 wow animate__animated animate__zoomIn" data-wow-delay="0.1s">
                <h1>Donasi, Infaq, Wakaf, dan Zakat <br> online sekarang bisa</h1>
            </div>
        
            <p class="hadits text-center wow animate__animated animate__zoomIn" data-wow-delay="0.2s">
                Hai orang-orang yang beriman, belanjakanlah (di jalan Allah) sebagian dari rezeki yang telah Kami <br> berikan kepadamu sebelum datang hari yang pada hari itu tidak ada lagi jual beli dan tidak ada lagi <br> syafa'at. Dan orang-orang kafir itulah orang-orang yang dzalim.
            </p>
            <img src="/Front-end/images/quran.jpg" alt="img-float" class="img__float4 img-fluid img-thumbnail rounded-circle shadow wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
            <img src="/Front-end/images/pot.jpg" alt="img-float" class="img__float3 img-fluid img-thumbnail rounded-circle shadow wow animate__animated animate__bounceIn" data-wow-delay="0.5s">
            <div class="container text-center">
                <a href="{{ route('donate') }}" class="btn btn-lg px-4 mt-5 animate__animated animate__pulse animate__infinite">
                    Donasi sekarang
                </a>
            </div>
        </div>
    </section>
</main>

<footer class="section-footer mt-5 mb-4 border-top">
    <div class="container pt-5 pb-5">
      <div class="row mx-auto mx-md-auto mt-4 justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12 col-sm col-md-12 col-lg-5 ">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                                <img src="/Front-end/images/footer.png" alt="footer" class="footer img-fluid">
                            </a>
                        </li>
                        <li>
                            <div class="row d-flex justify-content-center my-3">
                                <div class="col-1 col-sm-1 text-center">
                                    <i class="fa fa-solid fa-location-arrow"></i>
                                </div>
                                <div class="col">
                                    <p class="mb-0">
                                        Jl. Engku Putri, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29444
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row d-flex justify-content-center my-3">
                                <div class="col-1 col-sm-1">
                                    <i class="fa fa-solid fa-phone"></i>
                                </div>
                                <div class="col">
                                    <p class="mb-0">
                                        <a href="tel:+62812-907-9000" class="link-dark" style="color: white;">
                                            +62812-907-9000
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="col-12 col-sm col-md col-lg-1 ">
                 
                </div>
                <div class="col-12 col-sm col-md-3 col-lg-2 py-5 ">
                  <h5>COMPANY</h5>
                  <ul class="list-unstyled">
                    <li><a href="#" style="color: white;">Beranda</a></li>
                    <li><a href="#" style="color: white;">Layanan</a></li>
                    <li><a href="#" style="color: white;">Informasi</a></li>
                    <li><a href="#" style="color: white;">Fasilitas</a></li>
                    <li><a href="#" style="color: white;">Tentang</a></li>
                  </ul>
                </div>
                <div class="col-12 col-sm col-md-3 col-lg-2 py-5 ">
                  <h5>Social Media</h5>
                  <ul class="list-unstyled">
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Youtube</li>
                  </ul>
                </div>
                <div class="col-12 col-sm col-md-3 col-lg-2 py-5 ">
                    <h5>Get Connected</h5>
                    <ul class="list-unstyled">
                      <li>Batam Centre</li>
                      <li>Indonesia</li>
                      <li>0821 - 2222 - 8888</li>
                      <li>support@masjidagungbatam.id</li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>

<a href="#" class="scrollUp" id="scroll-up">
    <i class="ri-arrow-up-circle-fill scrollup__icon"></i>
</a>

<div class="container-fluid">
    <div class="row d-flex justify-content-center text-center align-items-center">
        <div class="col-auto text-gray-500 font-weight-light mb-4">
            • Made with <i class="fa fa-heart" style="color: red;"></i> in Batam •
        </div>
    </div>
</div>
@endsection


@push('addon-script')
<script>
    new WOW().init();

    $(document).ready(function(){
        if(window.screen.width <= 375 || window.screen.height <= 411 || window.screen.width <= 576 || window.screen.width <= 767){
            $('.caption').removeClass('w-50');
        } else if (window.screen.width <= 1199){
            $('.caption').addClass('w-100');
        }

        if(window.screen.width <= 411 || window.screen.height <= 576 || window.screen.width <= 767 || window.screen.width <= 991){
            $('.body__caption').removeClass('px-2');
            $('.body__caption').addClass('px-4');
        } else if (window.screen.width <= 1199){
            $('.body__caption').addClass('px-3');
            $('.body__caption').removeClass('px-4');
        }
    });
    
    $(window).resize(function(){
        if(window.screen.width <= 375 || window.screen.width <= 411 || window.screen.width <= 1199){
            $('.caption').removeClass('w-50');
            $('.caption').addClass('w-100');
        } else {
            $('.caption').addClass('w-50');
        }

        if(window.screen.width <= 576){
            $('.caption').removeClass('w-50');
            $('.body__caption').removeClass('px-2');
            $('.body__caption').addClass('px-4');
            $
        } else {
            $('.caption').addClass('w-75');
        }
    })

    function readMore(){
        let dots = document.getElementById('dots');
        let moreText = document.getElementById('more');
        let btnMore = document.getElementById('readMore');

        if(dots.style.display === "none"){
            dots.style.display = "inline";
            btnMore.innerHTML = "Baca lebih lanjut";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnMore.innerHTML = "Sembunyikan";
            moreText.style.display = "inline";
        }
    }
</script>
@endpush