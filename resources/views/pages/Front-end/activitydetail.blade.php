@extends('layouts.landingpage')

@section('content')
<main>
    <section class="announcement__section">
        <div class="container">
            <div class="row g-5 mt-5 mx-auto">
                <div class="col-md-12">
                    <h1 class="pb-4 mb-4 fst-italic border-bottom">
                        Jadwal kegiatan
                    </h1>
                    @forelse ($activities as $kegiatan)
                        <div class="container">
                            <div class="row my-5">
                                <div class="col col-sm-12 col-md-12 col-lg-13 offset animate__animated wow animate__fadeInUp" data-wow-delay="0.1s">
                                    <div class="card shadow-sm mt-4 card__jadwal p-3 flex-row" data-id="{{ $kegiatan->id }}" style="border-radius: 10px;">
                                        <div class="card-header poster"> 
                                            <img class="img-fluid mx-auto" src="{{ $kegiatan->poster ? Storage::url($kegiatan->poster) : 'https://via.placeholder.com/1000x900'}}" alt="poster" style="width: 1000px">
                                        </div>
                                        <div class="card-body caption">
                                            <h1 class="card-title">{{ $kegiatan->activity_name }}</h1>
                                            <div class="row mx-auto mx-sm-auto justify-content-between text-muted">
                                                <p>
                                                    <i class="fa fa-solid fa-calendar mr-1"></i>
                                                    {{ date('l, j F Y', strtotime($kegiatan->activity_date)) }}
                                                </p>
                                                <p>
                                                    {{ date('H:i', strtotime($kegiatan->activity_time)) }} WIB
                                                </p>
                                            </div>
                                            <div class="row mx-auto mx-sm-auto text-muted">
                                                <p>
                                                    <i class="fa-solid fa-user-group"></i>
                                                    {{ $kegiatan->audience_type }}
                                                </p>
                                            </div>
                                            <p class="contents">
                                                {!! substr(strip_tags($kegiatan->activity_detail), 0, 550) !!}
                                                @if (strlen(strip_tags($kegiatan->activity_detail)) > 550)
                                                    <span id="dots" class="dots{{ $kegiatan->id }}" data-id="{{ $kegiatan->id }}">...</span>
                                                    <span id="more" class="more{{ $kegiatan->id }}" data-id="{{ $kegiatan->id }}" style="display: none;">{!! substr($kegiatan->activity_detail, 550) !!}</span>
                                                @endif
                                            </p>
                                            <div class="text-right mt-2">
                                                <button id="readMore" class="btn btn-sm readMore{{ $kegiatan->id }}" data-id="{{ $kegiatan->id }}" onclick="readMore({{ $kegiatan->id }})">
                                                    Baca lebih lanjut
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        @for ($i = 0; $i < 10; $i++)
                        <div class="container">
                            <div class="row my-5">
                                <div class="col col-sm-12 col-md-12 col-lg-13 offset animate__animated wow animate__fadeInUp" data-wow-delay="0.1s">
                                    <div class="card shadow-sm mt-4 card__jadwal p-3 flex-row" style="border-radius: 10px;">
                                        <div class="card-header poster"> 
                                            <img class="img-fluid mx-auto" src="https://via.placeholder.com/1000x900" alt="poster">
                                        </div>
                                        <div class="card-body caption">
                                            <h1 class="card-title">Ini Kegiatan</h1>
                                            <div class="row mx-auto mx-sm-auto justify-content-between text-muted">
                                                <p>
                                                    <i class="fa fa-solid fa-calendar mr-1"></i>
                                                    28 Febuari 2022
                                                </p>
                                                <p>
                                                    <i class="fa-solid fa-clock mr-1"></i>
                                                    19.00 WIB
                                                </p>
                                            </div>
                                            <div class="row mx-auto mx-sm-auto text-muted">
                                                <p>
                                                    <i class="fa-solid fa-user-group"></i>
                                                    Umum
                                                </p>
                                            </div>
                                            <p style="display: inline">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque in officia reprehenderit 
                                                laborum culpa corrupti atque amet placeat enim obcaecati totam voluptatibus, 
                                                exercitationem provident, soluta porro quis adipisci labore tempore?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    @endforelse            
                </div>
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
                                <img src="/Front-end/images/footer.png" alt="footer" class="footer">
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

<div class="container-fluid">
    <div class="row d-flex justify-content-center text-center align-items-center">
        <div class="col-auto text-gray-500 font-weight-light mb-4">
            • Made with <i class="fa fa-heart" style="color: red;"></i> in Batam •
        </div>
    </div>
</div>
@endsection


@push('addon-style')
    <style>
        .poster{
            width: 50%;
        }

        .poster img {
            height: auto;
            width: auto;
            -o-object-fit: cover;
                object-fit: cover;
            border-radius: 10px;
        }

        .caption{
            width: 50%;
        }

        #readMore{
            background-color: #D46600;
            color: white;
        }
        
        .btn-readmore{
            background-color: #00A184;
            color: white;
        }

        @media screen and (max-width: 375px){
            .card-header{
                display: none;
            }
        }

        @media screen and (max-width: 411px){
            .card-header{
                display: none;
            }
        }

        @media screen and (max-width: 576px){
            .card-header{
                display: none;
            }
        }

        @media screen and (max-width: 768px){
            .card-header{
                display: none;
            }
        }

        @media screen and (max-width: 911px){
            .card-header{
                display: none;
            }
        }
    </style>
@endpush

@push('addon-script')
    <script>

        let lengthOfChar = 100
        let contents = document.querySelectorAll('.contents')

        contents.forEach(content => {
            if(content.textContent.length < 550){
                content.nextElementSibling.style.display = 'none'
            }
        });

         
        function readMore(id){
            let dots = document.getElementsByClassName('dots'+id);
            let moreText = document.getElementsByClassName('more'+id);
            let btnMore = document.getElementsByClassName('readMore'+id);
            
            console.log(moreText);
            for(let i = 0; i < dots.length; i++){
                if(dots[i].style.display === "none"){
                    dots[i].style.display = "inline";
                    moreText[i].style.display = "none";
                    btnMore[i].innerHTML = "Baca lebih lanjut";
                }else{
                    dots[i].style.display = "none";
                    moreText[i].style.display = "inline";
                    btnMore[i].innerHTML = "Tutup";
                }
            }                        
        }
     
    </script>
@endpush