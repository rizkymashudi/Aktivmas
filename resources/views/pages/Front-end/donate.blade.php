@extends('layouts.landingpage')

@section('content')
<main>
    <section class="main__section">
        <div class="container">
            <div class="row mt-5 pt-5 justify-content-center align-items-center text-center">
                <div class="col col-sm-5 col-md-5 col-lg-5">
                    <h1>Infaq / Shadaqoh / Wakaf</h1>
                    <h1 class="pt-3">Masjid Agung Batam</h1>
                    <h3 class="pt-3">dapat melalui QR code berikut:</h3>
                </div>
            </div>
            <div class="row my-5 pb-5">
                <div class="col-md-6 py-3 px-3">
                    <div class="main__section__image">
                        <img class="img-responsive img-fluid img-thumbnail shadow" src="Front-end/images/facility/donasi.jpeg" alt="masjid agung">
                    </div>
                </div>
                <div class="col-md-6 py-5 px-5">
                    <div class="main__section__content">
                        <h1 class="main__section__content__title">
                            QRIS Masjid Agung Batam
                        </h1>
                        <p class="main__section__content__text mt-5">
                            Alhamdulillah, kini Infaq, Shadaqoh, Wakaf ke Masjid Jabal Arafah. Hanya dengan 1 (satu) QR Code yaitu QRIS kita bisa berdonasi via GoPay, OVO, Link Aja, DANA, Shopee Pay, Mandiri Syariah Mobile, OCTO Mobile (CIMB), ONe Mobile (OCBC), dan BRIS Pay.
                        </p>

                        <p>
                            Berikut cara melakukan scan barcode QRIS:
                        </p>
                        <ul>
                            <li>Buka Aplikasi Gopay / OVO / Link Aja / BSM Mobile / BRIS Mobile / OCTP Mobile / DANA / ONe Mobile via HP-mu.</li>
                            <li>Pilih Pay / Bayar</li>
                            <li>Scan QRIS diatas melalui aplikasi keuangan kamu.</li>
                            <li>Masukkan Nominal Jumlah Infaq/Shadaqoh/Wakaf.</li>
                            <li>Selesai.</li>
                        </ul>
                    </div>
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
</script>
@endpush